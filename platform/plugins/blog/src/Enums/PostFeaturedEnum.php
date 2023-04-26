<?php
/**
 * PostFeaturedEnum.php
 * Created by: trainheartnet
 * Created at: 26/04/2023
 * Contact me at: longlengoc90@gmail.com
 */
namespace Botble\Blog\Enums;

use Botble\Base\Supports\Enum;
use Html;

class PostFeaturedEnum extends Enum
{
    public const FEATURED = 1;
    public const NORMAL = 0;

    /**
     * @var string
     */
    public static $langPath = 'plugins/blog::post.featured';

    /**
     * @return string
     */
    public function toHtml()
    {
        switch ($this->value) {
            case self::FEATURED:
                return Html::tag('span', self::FEATURED()->label(), ['class' => 'label-info status-label'])
                    ->toHtml();
            case self::NORMAL:
                return Html::tag('span', self::NORMAL()->label(), ['class' => 'label-warning status-label'])
                    ->toHtml();
            default:
                return parent::toHtml();
        }
    }
}
