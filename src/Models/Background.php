<?php

namespace Djavue\Apps\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Djavue\Engine\Facades\Handler;
use Djavue\Engine\Models\Project;

/**
 * Class Background
 *
 * @package Apps
 * @property string $subtitle "Multi Languages"
 * @property string $description "Multi Languages"
 * @property text $button_text "Multi Languages"
*/
class Background extends Model
{
    use SoftDeletes;
		
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'app_backgrounds';
	
	/**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'code', 'link', 'image', 'published_at', 'is_active', 'sorted_at'
	];
    
	/**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
	
	/**
     * Background constructor.
     *
     * @param array $attributes
     */
	public function __construct(array $attributes = array())
	{
		parent::__construct($attributes);
		
		$locales = Handler::getLanguages();
		foreach ($locales as $locale) {
			foreach ($this->getLocaleFields() as $field => $data) {
				$this->fillable[] = Handler::getProperty($field, $locale);
			}
		}
	}
	
    public static function storeValidation($request)
    {
        $items = [
            'code' => 'max:191|nullable',
            'link' => 'max:191|nullable',
            'image' => 'max:191|required',
            'published_at' => 'max:191|required',
            'is_active' => 'max:191|required',
            'sorted_at' => 'max:191|required'
        ];
		
		$locales = Handler::getLanguages();
		foreach ($locales as $locale) {
			foreach ($this->getLocaleFields() as $field => $data) {
				$items[Handler::getProperty($field, $locale)] = $data;
			}
		}
		
		return $items;
    }

    public static function updateValidation($request)
    {
        $items = [
            'code' => 'max:191|nullable',
            'link' => 'max:191|nullable',
            'image' => 'max:191|required',
            'published_at' => 'max:191|required',
            'is_active' => 'max:191|required',
            'sorted_at' => 'max:191|required'
        ];
		
		$locales = Handler::getLanguages();
		foreach ($locales as $locale) {
			foreach ($this->getLocaleFields() as $field => $data) {
				$items[Handler::getProperty($field, $locale)] = $data;
			}
		}
		
		return $items;
    }
	
	
	public function project()
    {
        return $this->belongsTo(Project::class, 'project_id')->withTrashed();
    }
	
	public function getLocaleFields()
	{
		return [
			'subtitle'	=> 'max:191|nullable',
			'description' => 'max:65535|nullable',
			'button_text' => 'max:191|nullable'
		];
	}
}
