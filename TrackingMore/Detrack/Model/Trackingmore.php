<?php
namespace TrackingMore\Detrack\Model;
use Magento\Framework\Model\AbstractModel;
class Trackingmore extends AbstractModel
{
    /**
     * Define resource model
     */
    protected function _construct()
    {
        $this->_init('TrackingMore\Detrack\Model\Resource\Trackingmore');
    }
}