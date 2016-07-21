<?php
 
namespace TrackingMore\Detrack\Controller\Hello;
 
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use TrackingMore\Detrack\Model\TrackingmoreFactory;
 
class Mcurd extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Tutorial\SimpleNews\Model\NewsFactory
     */
    protected $_modelTrackingmoreFactory;
 
    /**
     * @param Context $context
     * @param TrackingmoreFactory $modelTrackingmoreFactory
     */
    public function __construct(
        Context $context,
        TrackingmoreFactory $modelTrackingmoreFactory
    ) {
        parent::__construct($context);
        $this->_modelTrackingmoreFactory = $modelTrackingmoreFactory;
    }
 
    public function execute()
    {
        /**
         * When Magento get your model, it will generate a Factory class
         * for your model at var/generaton folder and we can get your
         * model by this way
         */
        $newsModel = $this->_modelTrackingmoreFactory->create();
 
        // Load the item with ID is 1
        $item = $newsModel->load(1);
        var_dump($item->getData());
 
        // Get news collection all table data
        $newsCollection = $newsModel->getCollection();
        // Load all data of collection
        var_dump($newsCollection->getData());
    }
}