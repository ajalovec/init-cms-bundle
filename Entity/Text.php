<?php
/**
 * This file is part of the init_cms_sandbox package.
 *
 * (c) net working AG <info@networking.ch>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
 
namespace Networking\InitCmsBundle\Entity;

/**
 * Class Text
 * @package Networking\InitCmsBundle\Entity
 * @author Yorkie Chadwick <y.chadwick@networking.ch>
 */
class Text extends BaseText{


    /**
     * @return array
     */
    public function getAdminContent()
    {
        $params = parent::getAdminContent();
        $params['template'] = 'CmsBundle:ContentType:text.html.twig';

        return $params;
    }

}
