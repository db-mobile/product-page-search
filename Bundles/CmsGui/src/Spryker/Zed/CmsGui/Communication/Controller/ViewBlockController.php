<?php


namespace Spryker\Zed\CmsGui\Communication\Controller;


use Spryker\Zed\Kernel\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * @method \Spryker\Zed\CmsGui\Communication\CmsGuiCommunicationFactory getFactory()
 */
class ViewBlockController extends AbstractController
{

    const URL_PARAM_ID_CMS_BLOCK = 'id-cms-block';

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     *
     * @return array
     */
    public function indexAction(Request $request)
    {
        $idCmsBlock = $this->castId($request->query->get(static::URL_PARAM_ID_CMS_BLOCK));

        $cmsBlockTransfer = $this->getFactory()
            ->getCmsBlockFacade()
            ->findCmsBlockId($idCmsBlock);

        if ($cmsBlockTransfer === null) {
            throw new NotFoundHttpException(
                sprintf('Cms block with id "%d" is not found.', $idCmsBlock)
            );
        }

        return [
            'cmsBlock' => $cmsBlockTransfer,
            'cmsBlockGlossary' => $cmsBlockTransfer->getGlossary(),
        ];
    }

}