<?php

/**
 * @namespace BwfTagcloud\View
 */
namespace BwfTagcloud\View;

/**
 * @uses Zend\View\Helper\AbstractHelper
 */
use Zend\View\Helper\AbstractHelper;

/**
 * цепляет скрипты, необходимые, для работы модуля.
 *
 * @package        BwfTagcloud
 * @subpackage     View
 * @author         Mikhail Levykin <roa72@mail.ru>
 * @changedby      $Author: beowulfus $
 * @version        SVN: $Id: $
 * @revision       SVN: $Revision: $
 * @link           $HeadURL: $
 * @date           $Date: $
 */
class AppendResources extends AbstractHelper
{
    /**
     * 
     * @return void
     */
    public function __invoke()
    {
        $v = $this->getView();
        $basePath = $v->plugin('basePath');
        
        $path = '/module/tagcloud/';
        $script = "var tagcloudBase = '" . $basePath($path) . "';";
        
        $v->plugin('headScript')
            ->appendFile($basePath($path . 'js/swfobject.js'))
            ->appendFile($basePath($path . 'js/tagcloud.js'))
            ->appendScript($script);    
    
    }
}