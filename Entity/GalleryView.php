<?php

namespace Networking\InitCmsBundle\Entity;

use Networking\InitCmsBundle\Model\GalleryView as ModelGalleryView;
/**
 * Networking\GalleryBundle\Entity\GalleryView
 */
class GalleryView extends ModelGalleryView
{

    /**
     */
    public function prePersist()
    {

        $this->createdAt = $this->updatedAt = new \DateTime("now");
    }

    /**
     * Hook on pre-update operations
     */
    public function preUpdate()
    {
        $this->updatedAt = new \DateTime('now');
    }


    /**
     * @return array
     */
    public function getAdminContent()
    {
        $params = parent::getAdminContent();
        $params['template'] = 'CmsBundle:ContentType:gallery_view.html.twig';

        return $params;
    }

}

