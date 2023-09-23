<?php

/**
 * @author    ChillCode <https://github.com/chillcode>
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License version 3.0
 */

namespace PrestaShop\Module\OrderFeatures\Core\Grid\Definition\Factory;

use PrestaShop\PrestaShop\Core\Grid\Action\Bulk\BulkActionCollection;
use PrestaShop\PrestaShop\Core\Grid\Action\Bulk\Type\ButtonBulkAction;
use PrestaShop\PrestaShop\Core\Grid\Action\Bulk\Type\ModalFormSubmitBulkAction;
use PrestaShop\PrestaShop\Core\Grid\Action\Bulk\Type\SubmitBulkAction;
use PrestaShop\PrestaShop\Core\Grid\Definition\Factory\AbstractFilterableGridDefinitionFactory;
use PrestaShop\PrestaShop\Core\Hook\HookDispatcherInterface;
use PrestaShop\PrestaShop\Core\Grid\Definition\Factory\OrderGridDefinitionFactory as OrderGridDefinitionFactoryCore;

/**
 * Creates definition for Orders grid
 */
final class OrderGridDefinitionFactory extends AbstractFilterableGridDefinitionFactory
{
    /**
     * @var OrderGridDefinitionFactoryCore
     */
    private $orderGridDefinitionFactoryCore;

    /**
     * @param OrderGridDefinitionFactoryCore $orderGridDefinitionFactoryCore
     * @param HookDispatcherInterface $dispatcher
     */
    public function __construct(
        OrderGridDefinitionFactoryCore $orderGridDefinitionFactoryCore,
        HookDispatcherInterface $dispatcher
    ) {
        parent::__construct($dispatcher);

        $this->orderGridDefinitionFactoryCore = $orderGridDefinitionFactoryCore;
    }

    /**
     * {@inheritdoc}
     */
    protected function getId()
    {
        return $this->orderGridDefinitionFactoryCore->getId();
    }

    /**
     * {@inheritdoc}
     */
    protected function getName()
    {
        return $this->orderGridDefinitionFactoryCore->getName();
    }

    /**
     * {@inheritdoc}
     */
    protected function getColumns()
    {
        return $this->orderGridDefinitionFactoryCore->getColumns();
    }

    /**
     * {@inheritdoc}
     */
    protected function getFilters()
    {
        return $this->orderGridDefinitionFactoryCore->getFilters();
    }

    /**
     * {@inheritdoc}
     */
    protected function getGridActions()
    {
        return $this->orderGridDefinitionFactoryCore->getGridActions();
    }

    /**
     * {@inheritdoc}
     */
    protected function getBulkActions()
    {
        return (new BulkActionCollection())->add((new ModalFormSubmitBulkAction('change_order_status'))
            ->setName($this->trans('Change Order Status', [], 'Admin.Orderscustomers.Feature'))
            ->setOptions([
                'submit_route' => 'admin_orders_change_orders_status',
                'modal_id' => 'changeOrdersStatusModal',
            ]))->add((new ButtonBulkAction('open_tabs'))
            ->setName($this->trans('Open in new tabs', [], 'Admin.Orderscustomers.Feature'))
            ->setOptions([
                'class' => 'open_tabs',
                'attributes' => [
                    'data-route' => 'admin_orders_view',
                    'data-route-param-name' => 'orderId',
                    'data-tabs-blocked-message' => $this->trans(
                        'It looks like you have exceeded the number of tabs allowed. Check your browser settings to open multiple tabs.',
                        [],
                        'Admin.Orderscustomers.Feature'
                    ),
                ],
            ]))->add((new SubmitBulkAction('delete_orders'))
            ->setName($this->trans('Delete', [], 'Admin.Orderscustomers.Feature'))
            ->setOptions([
                'confirm_message' =>  $this->trans(
                    'Do you want to delete selected orders?',
                    [],
                    'Admin.Orderscustomers.Feature'
                ),
                'submit_method' => 'POST',
                'submit_route' => 'admin_orders_bulk_delete'
            ]));
    }
}
