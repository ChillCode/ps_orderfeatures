<?php

/**
 * @author    ChillCode <https://github.com/chillcode>
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License version 3.0
 */

namespace PrestaShop\Module\OrderFeatures\Controller\Admin\Sell\Order;

use Exception;
use PrestaShop\PrestaShop\Core\Search\Filters\OrderFilters;
use PrestaShopBundle\Controller\Admin\FrameworkBundleAdminController;
use PrestaShopBundle\Controller\Admin\Sell\Order\OrderController as OrderControllerCore;
use PrestaShopBundle\Security\Annotation\AdminSecurity;
use PrestaShopBundle\Security\Annotation\DemoRestricted;
use PrestaShopBundle\Security\Annotation\ModuleActivated;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class OrderController.
 *
 * @ModuleActivated(moduleName="orderfeatures", redirectRoute="admin_module_manage")
 */
class OrderController extends FrameworkBundleAdminController
{
    /**
     * @var OrderControllerCore
     */
    private $orderControllerCore;

    public function __construct(?OrderControllerCore $orderControllerCore)
    {
        parent::__construct();

        $this->orderControllerCore = $orderControllerCore;
    }

    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @param LoggerInterface $logger
     */
    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function generateInvoicePdfAction($orderId)
    {
        return $this->orderControllerCore->generateInvoicePdfAction($orderId);
    }

    public function generateDeliverySlipPdfAction($orderId)
    {
        return $this->orderControllerCore->generateDeliverySlipPdfAction($orderId);
    }

    public function changeOrdersStatusAction(Request $request)
    {
        return $this->orderControllerCore->changeOrdersStatusAction($request);
    }

    public function exportAction(OrderFilters $filters)
    {
        return $this->orderControllerCore->exportAction($filters);
    }

    public function partialRefundAction(int $orderId, Request $request)
    {
        return $this->orderControllerCore->partialRefundAction($orderId, $request);
    }

    public function standardRefundAction(int $orderId, Request $request)
    {
        return $this->orderControllerCore->standardRefundAction($orderId, $request);
    }

    public function returnProductAction(int $orderId, Request $request)
    {
        return $this->orderControllerCore->returnProductAction($orderId, $request);
    }

    public function addProductAction(int $orderId, Request $request): Response
    {
        return $this->orderControllerCore->addProductAction($orderId, $request);
    }

    public function getProductPricesAction(int $orderId): Response
    {
        return $this->orderControllerCore->getProductPricesAction($orderId);
    }

    public function getInvoicesAction(int $orderId)
    {
        return $this->orderControllerCore->getInvoicesAction($orderId);
    }

    public function getDocumentsAction(int $orderId)
    {
        return $this->orderControllerCore->getDocumentsAction($orderId);
    }

    public function getShippingAction(int $orderId)
    {
        return $this->orderControllerCore->getShippingAction($orderId);
    }

    public function updateShippingAction(int $orderId, Request $request): RedirectResponse
    {
        return $this->orderControllerCore->updateShippingAction($orderId, $request);
    }

    public function removeCartRuleAction(int $orderId, int $orderCartRuleId): RedirectResponse
    {
        return $this->orderControllerCore->removeCartRuleAction($orderId, $orderCartRuleId);
    }

    public function updateInvoiceNoteAction(int $orderId, int $orderInvoiceId, Request $request): RedirectResponse
    {
        return $this->orderControllerCore->updateInvoiceNoteAction($orderId, $orderInvoiceId, $request);
    }

    public function updateProductAction(int $orderId, int $orderDetailId, Request $request): Response
    {
        return $this->orderControllerCore->updateProductAction($orderId, $orderDetailId, $request);
    }

    public function addCartRuleAction(int $orderId, Request $request): RedirectResponse
    {
        return $this->orderControllerCore->addCartRuleAction($orderId, $request);
    }

    public function updateStatusAction(int $orderId, Request $request): RedirectResponse
    {
        return $this->orderControllerCore->updateStatusAction($orderId, $request);
    }

    public function updateStatusFromListAction(int $orderId, Request $request): RedirectResponse
    {
        return $this->orderControllerCore->updateStatusFromListAction($orderId, $request);
    }

    public function addPaymentAction(int $orderId, Request $request): RedirectResponse
    {
        return $this->orderControllerCore->addPaymentAction($orderId, $request);
    }

    public function duplicateOrderCartAction(int $orderId)
    {
        return $this->orderControllerCore->duplicateOrderCartAction($orderId);
    }

    public function sendMessageAction(Request $request, int $orderId): Response
    {
        return $this->orderControllerCore->sendMessageAction($request, $orderId);
    }

    public function changeCustomerAddressAction(Request $request): RedirectResponse
    {
        return $this->orderControllerCore->changeCustomerAddressAction($request);
    }

    public function changeCurrencyAction(int $orderId, Request $request): RedirectResponse
    {
        return $this->orderControllerCore->changeCurrencyAction($orderId, $request);
    }

    public function resendEmailAction(int $orderId, int $orderStatusId, int $orderHistoryId): RedirectResponse
    {
        return $this->orderControllerCore->resendEmailAction($orderId, $orderStatusId, $orderHistoryId);
    }

    public function deleteProductAction(int $orderId, int $orderDetailId): JsonResponse
    {
        return $this->orderControllerCore->deleteProductAction($orderId, $orderDetailId);
    }

    public function getDiscountsAction(int $orderId): Response
    {
        return $this->orderControllerCore->getDiscountsAction($orderId);
    }

    public function getPricesAction(int $orderId): JsonResponse
    {
        return $this->orderControllerCore->getPricesAction($orderId);
    }

    public function getPaymentsAction(int $orderId): Response
    {
        return $this->orderControllerCore->getPaymentsAction($orderId);
    }

    public function getProductsListAction(int $orderId): Response
    {
        return $this->orderControllerCore->getProductsListAction($orderId);
    }

    public function generateInvoiceAction(int $orderId): RedirectResponse
    {
        return $this->orderControllerCore->generateInvoiceAction($orderId);
    }

    public function sendProcessOrderEmailAction(Request $request): JsonResponse
    {
        return $this->orderControllerCore->sendProcessOrderEmailAction($request);
    }

    public function cancellationAction(int $orderId, Request $request)
    {
        return $this->orderControllerCore->cancellationAction($orderId, $request);
    }

    public function configureProductPaginationAction(Request $request): JsonResponse
    {
        return $this->orderControllerCore->configureProductPaginationAction($request);
    }

    public function displayCustomizationImageAction(int $orderId, string $value)
    {
        return $this->orderControllerCore->displayCustomizationImageAction($orderId, $value);
    }

    public function setInternalNoteAction($orderId, Request $request)
    {
        return $this->orderControllerCore->setInternalNoteAction($orderId, $request);
    }

    public function searchProductsAction(Request $request): JsonResponse
    {
        return $this->orderControllerCore->searchProductsAction($request);
    }

    public function indexAction(Request $request, OrderFilters $filters)
    {
        return $this->orderControllerCore->indexAction($request, $filters);
    }

    public function viewAction(int $orderId, Request $request): Response
    {
        return $this->orderControllerCore->viewAction($orderId, $request);
    }

    public function placeAction(Request $request)
    {
        return $this->orderControllerCore->placeAction($request);
    }

    public function createAction(Request $request)
    {
        return $this->orderControllerCore->createAction($request);
    }

    public function searchAction(Request $request)
    {
        return $this->orderControllerCore->searchAction($request);
    }

    public function previewAction(int $orderId): JsonResponse
    {
        return $this->orderControllerCore->previewAction($orderId);
    }

    /**
     * Delete order.
     *
     * @AdminSecurity("is_granted(['delete'], request.get('_legacy_controller'))")
     * @DemoRestricted(redirectRoute="admin_orders_index")
     */
    private function deleteAction($orderId)
    {
        /** @var \PrestaShop\Module\OrderFeatures\Adapter\Order\Repository\OrderRepository */
        $repository = $this->get('prestashop.module.orderfeatures.adapter.order.repository.order_repository');

        try {
            $repository->deleteOrder($orderId);
        } catch (Exception $th) {
            $this->flashErrors([['key' => 'Error deleting order with id %id%', 'parameters' => ['%id%' => $orderId], 'domain' => 'Admin.Catalog.Notification']]);

            $this->logger->warning($th->getMessage(), ['object_type' => 'Order', 'object_id' => $orderId, 'allow_duplicate' => false, 'error_code' => $th->getCode()]);

            return false;
        }

        $this->logger->info('Order has been successfully deleted', ['object_type' => 'Order', 'object_id' => $orderId, 'allow_duplicate' => false]);

        return true;
    }

    /**
     * Process bulk orders deletion.
     *
     * @AdminSecurity("is_granted(['delete'], request.get('_legacy_controller'))")
     * @DemoRestricted(redirectRoute="admin_orders_index")
     *
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function bulkDeleteAction(Request $request)
    {
        $ordersToDelete = $request->request->get('order_orders_bulk', []);

        if (empty($ordersToDelete)) {
            $this->addFlash(
                'error',
                $this->trans('You must select at least one element to delete.', 'Admin.Notifications.Error')
            );
        } else {
            $ordersToDeleteResult = true;

            foreach ($ordersToDelete as $orderToDelete) {
                $ordersToDeleteResult &= $this->deleteAction($orderToDelete);
            }

            if ($ordersToDeleteResult) {
                $this->addFlash(
                    'success',
                    $this->trans('The selection has been successfully deleted.', 'Admin.Notifications.Success')
                );
            }
        }

        return $this->redirectToRoute('admin_orders_index');
    }
}
