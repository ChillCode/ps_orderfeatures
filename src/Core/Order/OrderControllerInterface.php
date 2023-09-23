<?php

/**
 * @author    ChillCode <https://github.com/chillcode>
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License version 3.0
 */

namespace PrestaShop\Module\OrderFeatures\Core\Order;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use PrestaShop\PrestaShop\Core\Search\Filters\OrderFilters;

interface OrderControllerInterface
{
    public function indexAction(Request $request, OrderFilters $filters);

    public function placeAction(Request $request);

    public function createAction(Request $request);

    public function searchAction(Request $request);

    public function generateInvoicePdfAction($orderId);

    public function generateDeliverySlipPdfAction($orderId);

    public function changeOrdersStatusAction(Request $request);

    public function exportAction(OrderFilters $filters);

    public function viewAction(int $orderId, Request $request): Response;

    public function partialRefundAction(int $orderId, Request $request);

    public function standardRefundAction(int $orderId, Request $request);

    public function returnProductAction(int $orderId, Request $request);

    public function addProductAction(int $orderId, Request $request): Response;

    public function getProductPricesAction(int $orderId): Response;

    public function getInvoicesAction(int $orderId);

    public function getDocumentsAction(int $orderId);

    public function getShippingAction(int $orderId);

    public function updateShippingAction(int $orderId, Request $request): RedirectResponse;

    public function removeCartRuleAction(int $orderId, int $orderCartRuleId): RedirectResponse;

    public function updateInvoiceNoteAction(int $orderId, int $orderInvoiceId, Request $request): RedirectResponse;

    public function updateProductAction(int $orderId, int $orderDetailId, Request $request): Response;

    public function addCartRuleAction(int $orderId, Request $request): RedirectResponse;

    public function updateStatusAction(int $orderId, Request $request): RedirectResponse;

    public function updateStatusFromListAction(int $orderId, Request $request): RedirectResponse;

    public function addPaymentAction(int $orderId, Request $request): RedirectResponse;

    public function previewAction(int $orderId): JsonResponse;

    public function duplicateOrderCartAction(int $orderId);

    public function sendMessageAction(Request $request, int $orderId): Response;

    public function changeCustomerAddressAction(Request $request): RedirectResponse;

    public function changeCurrencyAction(int $orderId, Request $request): RedirectResponse;

    public function resendEmailAction(int $orderId, int $orderStatusId, int $orderHistoryId): RedirectResponse;

    public function deleteProductAction(int $orderId, int $orderDetailId): JsonResponse;

    public function getDiscountsAction(int $orderId): Response;

    public function getPricesAction(int $orderId): JsonResponse;

    public function getPaymentsAction(int $orderId): Response;

    public function getProductsListAction(int $orderId): Response;

    public function generateInvoiceAction(int $orderId): RedirectResponse;

    public function sendProcessOrderEmailAction(Request $request): JsonResponse;

    public function cancellationAction(int $orderId, Request $request);

    public function configureProductPaginationAction(Request $request): JsonResponse;

    public function displayCustomizationImageAction(int $orderId, string $value);

    public function setInternalNoteAction($orderId, Request $request);

    public function searchProductsAction(Request $request): JsonResponse;
}
