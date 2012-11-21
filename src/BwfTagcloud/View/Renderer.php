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
class Renderer extends AbstractHelper
{

    protected $partial = 'bwf-tagcloud/tagcloud';

    protected $tags;

    public function __construct(array $tags)
    {
        $this->tags = $tags;
    }

    /**
     * 
     * @return void
     */
    public function __invoke()
    {
        return $this->getView()
            ->partial($this->partial, 
            array(
                'tags' => $this->tags
            ));
    
    }
}