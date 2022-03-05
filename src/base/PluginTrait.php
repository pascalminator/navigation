<?php
namespace verbb\navigation\base;

use verbb\navigation\Navigation;
use verbb\navigation\services\Breadcrumbs;
use verbb\navigation\services\Elements;
use verbb\navigation\services\Navs;
use verbb\navigation\services\Nodes;
use verbb\navigation\services\NodeTypes;

use Craft;

use yii\log\Logger;

use verbb\base\BaseHelper;

trait PluginTrait
{
    // Properties
    // =========================================================================

    public static Navigation $plugin;


    // Static Methods
    // =========================================================================

    public static function log($message): void
    {
        Craft::getLogger()->log($message, Logger::LEVEL_INFO, 'navigation');
    }

    public static function error($message): void
    {
        Craft::getLogger()->log($message, Logger::LEVEL_ERROR, 'navigation');
    }


    // Public Methods
    // =========================================================================

    public function getBreadcrumbs(): Breadcrumbs
    {
        return $this->get('breadcrumbs');
    }

    public function getElements(): Elements
    {
        return $this->get('elements');
    }

    public function getNavs(): Navs
    {
        return $this->get('navs');
    }

    public function getNodes(): Nodes
    {
        return $this->get('nodes');
    }

    public function getNodeTypes(): NodeTypes
    {
        return $this->get('nodeTypes');
    }


    // Private Methods
    // =========================================================================

    private function _setPluginComponents(): void
    {
        $this->setComponents([
            'breadcrumbs' => Breadcrumbs::class,
            'elements' => Elements::class,
            'navs' => Navs::class,
            'nodes' => Nodes::class,
            'nodeTypes' => NodeTypes::class,
        ]);

        BaseHelper::registerModule();
    }

    private function _setLogging(): void
    {
        BaseHelper::setFileLogging('navigation');
    }

}