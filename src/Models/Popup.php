<?php

namespace Djavue\Apps\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Djavue\Engine\Facades\Handler;
use Djavue\Engine\Models\Page;

/**
 * Class Popup
 *
 * @package Apps
 * @property string $name "Multi Languages"
 * @property string $subtitle "Multi Languages"
 * @property string $description "Multi Languages"
*/
class InnerBackground extends Model
{
    use SoftDeletes;
			
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'app_popups';
	
	/**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['link', 'image', 'background', 'published_at', 'unpublished_at', 'is_active'];
    
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
            'link' => 'max:191|required',
            'image' => 'max:191|required',
            'background' => 'max:191|required',
            'published_at' => 'max:191|required',
            'unpublished_at' => 'max:191|required',
            'is_active' => 'max:191|required'
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
            'link' => 'max:191|required',
            'image' => 'max:191|required',
            'background' => 'max:191|required',
            'published_at' => 'max:191|required',
            'unpublished_at' => 'max:191|required',
            'is_active' => 'max:191|required'
        ];
		
		$locales = Handler::getLanguages();
		foreach ($locales as $locale) {
			foreach ($this->getLocaleFields() as $field => $data) {
				$items[Handler::getProperty($field, $locale)] = $data;
			}
		}
		
		return $items;
    }
	
	
	public function page()
    {
        return $this->belongsTo(Page::class, 'page_id')->withTrashed();
    }
	
	public function getLocaleFields()
	{
		return [
			'name'	=> 'max:191|nullable',
			'subtitle'	=> 'max:191|nullable',
			'description' => 'max:65535|nullable'
		];
	}
}
