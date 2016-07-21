<?php
namespace TrackingMore\Detrack\Controller\Hello;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Context;

class World extends \Magento\Framework\App\Action\Action
{
    protected $pageFactory;
    public function __construct(Context $context, PageFactory $pageFactory)
    {
        $this->pageFactory = $pageFactory;
        return parent::__construct($context);
    }

    public function execute()
    {      
        print_r(__METHOD__);
		$a=111;
        $page_object = $this->pageFactory->create();;
        return $page_object;
    }    
}