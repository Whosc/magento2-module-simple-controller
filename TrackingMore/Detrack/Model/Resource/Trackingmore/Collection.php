<?php
namespace TrackingMore\Detrack\Model\Resource\Trackingmore;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
 
class Collection extends AbstractCollection
{
    /**
     * Define model & resource model
     */
    protected function _construct()
    {
        $this->_init(
            'TrackingMore\Detrack\Model\Trackingmore',
            'TrackingMore\Detrack\Model\Resource\Trackingmore'
        );
    }
}