<?php
 
namespace TrackingMore\Detrack\Model\Resource;
 
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
 
class Trackingmore extends AbstractDb
{
    /**
     * Define main table
     */
    protected function _construct()
    {
        $this->_init('trackingmore_detrack', 'post_id');
    }
}