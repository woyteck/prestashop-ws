<?php
declare(strict_types=1);

namespace Woyteck\Prestashop;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\RequestOptions;
use SimpleXMLElement;
use stdClass;
use Woyteck\Db\ModelFactory;
use Woyteck\Prestashop\Model\Address;
use Woyteck\Prestashop\Model\Category;
use Woyteck\Prestashop\Model\Combination;
use Woyteck\Prestashop\Model\Country;
use Woyteck\Prestashop\Model\Customer;
use Woyteck\Prestashop\Model\CustomerMessage;
use Woyteck\Prestashop\Model\Manufacturer;
use Woyteck\Prestashop\Model\Message;
use Woyteck\Prestashop\Model\ModelInterface;
use Woyteck\Prestashop\Model\Order;
use Woyteck\Prestashop\Model\OrderCarrier;
use Woyteck\Prestashop\Model\Product;
use Woyteck\Prestashop\Model\ProductFeature;
use Woyteck\Prestashop\Model\ProductFeatureValue;
use Woyteck\Prestashop\Model\ProductImage;
use Woyteck\Prestashop\Model\ProductOption;
use Woyteck\Prestashop\Model\ProductOptionValue;
use Woyteck\Prestashop\Model\SpecificPrice;
use Woyteck\Prestashop\Model\StockAvailable;
use Woyteck\Prestashop\Model\Tag;
use Woyteck\Prestashop\Model\Tax;
use Woyteck\Prestashop\Model\TaxRule;
use Woyteck\Prestashop\Model\TaxRuleGroup;
use Woyteck\Webservice\GuzzleBasedAbstract;

class WsPrestashop extends GuzzleBasedAbstract
{
    private const RESOURCE_CATEGORIES = 'categories';
    private const RESOURCE_PRODUCTS = 'products';
    private const RESOURCE_COMBINATIONS = 'combinations';
    private const RESOURCE_PRODUCT_IMAGES = 'images/products';
    private const RESOURCE_PRODUCT_FEATURES = 'product_features';
    private const RESOURCE_PRODUCT_FEATURE_VALUES = 'product_feature_values';
    private const RESOURCE_PRODUCT_OPTIONS = 'product_options';
    private const RESOURCE_PRODUCT_OPTION_VALUES = 'product_option_values';
    private const RESOURCE_STOCK_AVAILABLES = 'stock_availables';
    private const RESOURCE_MANUFACTURERS = 'manufacturers';
    private const RESOURCE_ORDERS = 'orders';
    private const RESOURCE_BL_ORDERS = 'orders';
    private const RESOURCE_ORDER_CARRIERS = 'order_carriers';
    private const RESOURCE_CUSTOMERS = 'customers';
    private const RESOURCE_ADDRESSES = 'addresses';
    private const RESOURCE_CUSTOMER_MESSAGES = 'customer_messages';
    private const RESOURCE_MESSAGES = 'messages';
    private const RESOURCE_SPECIFIC_PRICES = 'specific_prices';
    private const RESOURCE_TAXES = 'taxes';
    private const RESOURCE_TAX_RULES = 'tax_rules';
    private const RESOURCE_TAX_RULE_GROUPS = 'tax_rule_groups';
    private const RESOURCE_COUNTRIES = 'countries';
    private const RESOURCE_TAGS = 'tags';

    private const SINGLE = [
        self::RESOURCE_CATEGORIES => 'category',
        self::RESOURCE_PRODUCTS => 'product',
        self::RESOURCE_COMBINATIONS => 'combination',
        self::RESOURCE_PRODUCT_IMAGES => 'image',
        self::RESOURCE_PRODUCT_FEATURES => 'product_feature',
        self::RESOURCE_PRODUCT_FEATURE_VALUES => 'product_feature_value',
        self::RESOURCE_PRODUCT_OPTIONS => 'product_option',
        self::RESOURCE_PRODUCT_OPTION_VALUES => 'product_option_value',
        self::RESOURCE_STOCK_AVAILABLES => 'stock_available',
        self::RESOURCE_MANUFACTURERS => 'manufacturer',
        self::RESOURCE_ORDERS => 'order',
        self::RESOURCE_BL_ORDERS => 'order',
        self::RESOURCE_ORDER_CARRIERS => 'order_carrier',
        self::RESOURCE_CUSTOMERS => 'customer',
        self::RESOURCE_ADDRESSES => 'address',
        self::RESOURCE_CUSTOMER_MESSAGES => 'customer_message',
        self::RESOURCE_MESSAGES => 'message',
        self::RESOURCE_SPECIFIC_PRICES => 'specific_price',
        self::RESOURCE_TAXES => 'tax',
        self::RESOURCE_TAX_RULES => 'tax_rule',
        self::RESOURCE_TAX_RULE_GROUPS => 'tax_rule_group',
        self::RESOURCE_COUNTRIES => 'country',
        self::RESOURCE_TAGS => 'tags',
    ];

    /** @var ModelInterface[] */
    private const MODEL = [
        self::RESOURCE_CATEGORIES => Category::class,
        self::RESOURCE_PRODUCTS => Product::class,
        self::RESOURCE_COMBINATIONS => Combination::class,
        self::RESOURCE_PRODUCT_IMAGES => ProductImage::class,
        self::RESOURCE_PRODUCT_FEATURES => ProductFeature::class,
        self::RESOURCE_PRODUCT_FEATURE_VALUES => ProductFeatureValue::class,
        self::RESOURCE_PRODUCT_OPTIONS => ProductOption::class,
        self::RESOURCE_PRODUCT_OPTION_VALUES => ProductOptionValue::class,
        self::RESOURCE_STOCK_AVAILABLES => StockAvailable::class,
        self::RESOURCE_MANUFACTURERS => Manufacturer::class,
        self::RESOURCE_ORDERS => Order::class,
        self::RESOURCE_BL_ORDERS => Order::class,
        self::RESOURCE_ORDER_CARRIERS => OrderCarrier::class,
        self::RESOURCE_CUSTOMERS => Customer::class,
        self::RESOURCE_ADDRESSES => Address::class,
        self::RESOURCE_CUSTOMER_MESSAGES => CustomerMessage::class,
        self::RESOURCE_MESSAGES => Message::class,
        self::RESOURCE_SPECIFIC_PRICES => SpecificPrice::class,
        self::RESOURCE_TAXES => Tax::class,
        self::RESOURCE_TAX_RULES => TaxRule::class,
        self::RESOURCE_TAX_RULE_GROUPS => TaxRuleGroup::class,
        self::RESOURCE_COUNTRIES => Country::class,
        self::RESOURCE_TAGS => Tag::class,
    ];

    /** @var string */
    private $httpScheme;

    /** @var string */
    private $url;

    /** @var string */
    private $key;

    public function __construct(Client $client, ModelFactory $modelFactory, string $httpScheme, string $url, string $key)
    {
        parent::__construct($client, $modelFactory);

        $this->httpScheme = $httpScheme;
        $this->url = $url;
        $this->key = $key;
    }

    /**
     * @return array|Category[]
     */
    public function getCategories(): array
    {
        return $this->getResources(self::RESOURCE_CATEGORIES);
    }

    /**
     * @param int $id
     * @return ModelInterface|Category
     */
    public function getCategory(int $id): ?ModelInterface
    {
        return $this->getResource(self::RESOURCE_CATEGORIES, $id);
    }

    /**
     * @param Category $category
     * @return ModelInterface|Category
     * @throws WsException
     */
    public function addCategory(Category $category): ModelInterface
    {
        return $this->addResource(self::RESOURCE_CATEGORIES, $category);
    }

    /**
     * @param Category $category
     * @return ModelInterface|Category
     * @throws WsException
     */
    public function updateCategory(Category $category): ModelInterface
    {
        return $this->updateResource(self::RESOURCE_CATEGORIES, $category);
    }

    public function deleteCategory(int $id): void
    {
        $this->deleteResource(self::RESOURCE_CATEGORIES, $id);
    }

    /**
     * @return array|Product[]
     */
    public function getProducts(): array
    {
        return $this->getResources(self::RESOURCE_PRODUCTS);
    }

    /**
     * @param int $id
     * @return ModelInterface|Product
     */
    public function getProduct(int $id): ?ModelInterface
    {
        return $this->getResource(self::RESOURCE_PRODUCTS, $id);
    }

    /**
     * @param string $ean
     * @return ModelInterface|Product|null
     */
    public function getProductByEan(string $ean): ?ModelInterface
    {
        return $this->getResourceByFieldValue(self::RESOURCE_PRODUCTS, 'ean13', $ean);
    }

    /**
     * @param string $name
     * @return ModelInterface|null
     */
    public function getProductByName(string $name): ?ModelInterface
    {
        return $this->getResourceByFieldValue(self::RESOURCE_PRODUCTS, 'name', $name);
    }

    /**
     * @param string $reference
     * @return ModelInterface|null
     */
    public function getProductByReference(string $reference): ?ModelInterface
    {
        return $this->getResourceByFieldValue(self::RESOURCE_PRODUCTS, 'reference', $reference);
    }

    /**
     * @param Product $product
     * @return ModelInterface|Product
     * @throws WsException
     */
    public function addProduct(Product $product): ModelInterface
    {
        return $this->addResource(self::RESOURCE_PRODUCTS, $product);
    }

    /**
     * @param Product $product
     * @return ModelInterface|Product
     * @throws WsException
     */
    public function updateProduct(Product $product): ModelInterface
    {
        return $this->updateResource(self::RESOURCE_PRODUCTS, $product);
    }

    public function deleteProduct(int $id): void
    {
        $this->deleteResource(self::RESOURCE_PRODUCTS, $id);
    }

    /**
     * @return array|Combination[]
     */
    public function getCombinations(): array
    {
        return $this->getResources(self::RESOURCE_COMBINATIONS);
    }

    /**
     * @param int $id
     * @return ModelInterface|Combination
     */
    public function getCombination(int $id): ?ModelInterface
    {
        return $this->getResource(self::RESOURCE_COMBINATIONS, $id);
    }

    /**
     * @param Combination $combination
     * @return ModelInterface
     * @throws WsException
     */
    public function addCombination(Combination $combination): ModelInterface
    {
        return $this->addResource(self::RESOURCE_COMBINATIONS, $combination);
    }

    /**
     * @param Combination $combination
     * @return ModelInterface
     * @throws WsException
     */
    public function updateCombination(Combination $combination): ModelInterface
    {
        return $this->updateResource(self::RESOURCE_COMBINATIONS, $combination);
    }

    public function deleteCombination(int $id): void
    {
        $this->deleteResource(self::RESOURCE_COMBINATIONS, $id);
    }

    /**
     * @return array|StockAvailable[]
     */
    public function getStockAvailables(): array
    {
        return $this->getResources(self::RESOURCE_STOCK_AVAILABLES);
    }

    /**
     * @param int $id
     * @return ModelInterface|StockAvailable
     */
    public function getStockAvailable(int $id): ?ModelInterface
    {
        return $this->getResource(self::RESOURCE_STOCK_AVAILABLES, $id);
    }
    
    public function setStockAvailable(StockAvailable $stockAvailable)
    {
        return $this->updateResource(self::RESOURCE_STOCK_AVAILABLES, $stockAvailable);
    }

    /**
     * @param StockAvailable $stockAvailable
     * @return ModelInterface|StockAvailable
     * @throws WsException
     *
     * @deprecated
     * This will actually not work, because prestashop doesn't allow it.
     * Instead stock_available is created automatically after adding a product
     */
    public function addStockAvailable(StockAvailable $stockAvailable): ModelInterface
    {
        return $this->addResource(self::RESOURCE_STOCK_AVAILABLES, $stockAvailable);
    }

    /**
     * @param StockAvailable $stockAvailable
     * @return ModelInterface|StockAvailable
     * @throws WsException
     */
    public function updateStockAvailable(StockAvailable $stockAvailable): ModelInterface
    {
        return $this->updateResource(self::RESOURCE_STOCK_AVAILABLES, $stockAvailable);
    }

    public function deleteStockAvailable(int $id): void
    {
        $this->deleteResource(self::RESOURCE_STOCK_AVAILABLES, $id);
    }

    /**
     * @return array|ModelInterface[]|Manufacturer[]
     */
    public function getManufacturers(): array
    {
        return $this->getResources(self::RESOURCE_MANUFACTURERS);
    }

    /**
     * @param int $id
     * @return ModelInterface|Manufacturer
     */
    public function getManufacturer(int $id): ModelInterface
    {
        return $this->getResource(self::RESOURCE_MANUFACTURERS, $id);
    }

    /**
     * @param string $name
     * @return ModelInterface|Manufacturer|null
     */
    public function getManufacturerByName(string $name): ?ModelInterface
    {
        return $this->getResourceByFieldValue(self::RESOURCE_MANUFACTURERS, 'name', $name);
    }

    /**
     * @param Manufacturer $manufacturer
     * @return ModelInterface|Manufacturer
     * @throws WsException
     */
    public function addManufacturer(Manufacturer $manufacturer): ModelInterface
    {
        return $this->addResource(self::RESOURCE_MANUFACTURERS, $manufacturer);
    }

    /**
     * @param Manufacturer $manufacturer
     * @return ModelInterface|Manufacturer
     * @throws WsException
     */
    public function updateManufacturer(Manufacturer $manufacturer): ModelInterface
    {
        return $this->updateResource(self::RESOURCE_MANUFACTURERS, $manufacturer);
    }

    public function deleteManufacturer(int $id): void
    {
        $this->deleteResource(self::RESOURCE_MANUFACTURERS, $id);
    }

    /**
     * @param int $productId
     * @return array|ProductImage
     */
    public function getProductImages(int $productId): array
    {
        $url = $this->constructUrl(self::RESOURCE_PRODUCT_IMAGES, $productId);
        $response = $this->getXml($url);
        $resources = [];

        foreach ($response->image->declination as $declination) {
            $productImage = new ProductImage();
            $productImage->setId((int) $declination['id']);
            $namespaces = $declination->getNamespaces();
            $productImage->setUrl((string) $declination->attributes($namespaces['xlink']));
            $resources[] = $productImage;
        }

        return $resources;
    }

    public function getProductImage(int $productId, int $imageId): string
    {
        $url = $this->constructUrl(self::RESOURCE_PRODUCT_IMAGES, $productId) . '/' . $imageId;
        $response = $this->send('get', $url);

        return $response->getBody()->getContents();
    }

    /**
     * @param int $productId
     * @param string $imagePath
     * @param string|null $alt
     * @return int
     * @throws WsException
     */
    public function addProductImage(int $productId, string $imagePath, string $alt = null)
    {
        $url = $this->constructUrl(self::RESOURCE_PRODUCT_IMAGES, $productId);
        if (file_exists($imagePath) === false) {
            throw new WsException('File not found. Path: ' . $imagePath);
        }

        $file = fopen($imagePath, 'r');
        $options = [
            RequestOptions::HEADERS => [
                'Io-Format' => 'JSON',
                'Output-Format' => 'JSON',
            ],
            RequestOptions::MULTIPART => [
                [
                    'name' => 'image',
                    'alt' => $alt,
                    'contents' => $file
                ]
            ],
        ];

        try {
            $imageIdsBefore = $this->getProductImageIds($productId);
            $this->send('post', $url, $options);
            $imageIdsAfter = $this->getProductImageIds($productId);
            $diff = array_diff($imageIdsAfter, $imageIdsBefore);
            $imageId = reset($diff);
            if (!is_int($imageId)) {
                throw new WsException('Failed to determine image id');
            }

            return $imageId;
        } catch (BadResponseException $e) {
            $data = json_decode($e->getResponse()->getBody()->getContents(), true);
            if (!isset($data['errors'])) {
                throw $e;
            }

            throw new WsException($this->createErrorResponse($data));
        }
    }

    /**
     * @param int $productId
     * @return array
     */
    private function getProductImageIds(int $productId): array
    {
        $product = $this->getProduct($productId);
        if ($product === null) {
            return [];
        }

        $associations = $product->getAssociations();
        $imageIds = [];
        if (is_array($associations) && isset($associations['images'])) {
            foreach ($associations['images'] as $image) {
                $imageIds[] = (int) $image['id'];
            }
        }
        return $imageIds;
    }

    /**
     * @param array|null $filters
     * @return array|Order[]
     */
    public function getOrders(array $filters = null): array
    {
        return $this->getResources(self::RESOURCE_ORDERS, $filters);
    }

    /**
     * @param int $id
     * @return ModelInterface|Order|null
     */
    public function getOrder(int $id): ?ModelInterface
    {
        return $this->getResource(self::RESOURCE_ORDERS, $id);
    }

    /**
     * @param Order $order
     * @return ModelInterface|Order|null
     * @throws WsException
     */
    public function updateOrder(Order $order): ?ModelInterface
    {
        return $this->updateResource(self::RESOURCE_ORDERS, $order);
    }

    /**
     * @param array|null $filters
     * @return array|Order[]
     */
    public function getBlOrders(array $filters = null): array
    {
        return $this->getResources(self::RESOURCE_BL_ORDERS, $filters, 'bl_order', 'bl_order');
    }

    /**
     * @param int $id
     * @return ModelInterface|Order|null
     */
    public function getBlOrder(int $id): ?ModelInterface
    {
        return $this->getResource(self::RESOURCE_BL_ORDERS, $id, 'bl_order');
    }

    /**
     * @param int $id
     * @return ModelInterface|OrderCarrier|null
     */
    public function getOrderCarrier(int $id): ?ModelInterface
    {
        return $this->getResource(self::RESOURCE_ORDER_CARRIERS, $id);
    }

    /**
     * @param OrderCarrier $orderCarrier
     * @return ModelInterface|OrderCarrier|null
     * @throws WsException
     */
    public function updateOrderCarrier(OrderCarrier $orderCarrier): ?ModelInterface
    {
        return $this->updateResource(self::RESOURCE_ORDER_CARRIERS, $orderCarrier);
    }

    /**
     * @return array|OrderCarrier[]
     */
    public function getOrderCarriers(): array
    {
        return $this->getResources(self::RESOURCE_ORDER_CARRIERS);
    }

    /**
     * @param int $id
     * @return ModelInterface|Customer|null
     */
    public function getCustomer(int $id): ?ModelInterface
    {
        return $this->getResource(self::RESOURCE_CUSTOMERS, $id);
    }

    /**
     * @param int $id
     * @return ModelInterface|Address|null
     */
    public function getAddress(int $id): ?ModelInterface
    {
        return $this->getResource(self::RESOURCE_ADDRESSES, $id);
    }

    public function getCustomerMessages(): array
    {
        return $this->getResources(self::RESOURCE_CUSTOMER_MESSAGES);
    }

    public function getCustomerMessage(int $id): ?ModelInterface
    {
        return $this->getResource(self::RESOURCE_CUSTOMER_MESSAGES, $id);
    }

    public function getMessages(array $filters = null): array
    {
        return $this->getResources(self::RESOURCE_MESSAGES, $filters);
    }

    /**
     * @param array|null $filters
     * @return array|SpecificPrice[]
     */
    public function getSpecificPrices(array $filters = null): array
    {
        return $this->getResources(self::RESOURCE_SPECIFIC_PRICES, $filters);
    }

    /**
     * @param int $id
     * @return ModelInterface|SpecificPrice|null
     */
    public function getSpecificPrice(int $id): ?SpecificPrice
    {
        return $this->getResource(self::RESOURCE_SPECIFIC_PRICES, $id);
    }

    /**
     * @param string $productId
     * @return ModelInterface|SpecificPrice|null
     */
    public function getSpecificPriceByProductId(int $productId): ?ModelInterface
    {
        return $this->getResourceByFieldValue(self::RESOURCE_SPECIFIC_PRICES, 'id_product', (string) $productId);
    }

    /**
     * @param SpecificPrice $specificPrice
     * @return ModelInterface|SpecificPrice
     * @throws WsException
     */
    public function addSpecificPrice(SpecificPrice $specificPrice): ModelInterface
    {
        return $this->addResource(self::RESOURCE_SPECIFIC_PRICES, $specificPrice);
    }

    /**
     * @param SpecificPrice $specificPrice
     * @return ModelInterface|SpecificPrice
     * @throws WsException
     */
    public function updateSpecificPrice(SpecificPrice $specificPrice): ModelInterface
    {
        return $this->updateResource(self::RESOURCE_SPECIFIC_PRICES, $specificPrice);
    }

    public function deleteSpecificPrice(int $id): void
    {
        $this->deleteResource(self::RESOURCE_SPECIFIC_PRICES, $id);
    }

    /**
     * @param array|null $filters
     * @return array|Tax[]
     */
    public function getTaxes(array $filters = null): array
    {
        return $this->getResources(self::RESOURCE_TAXES, $filters);
    }

    /**
     * @param int $id
     * @return ModelInterface|Tax|null
     */
    public function getTax(int $id): ?Tax
    {
        return $this->getResource(self::RESOURCE_TAXES, $id);
    }

    /**
     * @param Tax $tax
     * @return ModelInterface|Tax
     * @throws WsException
     */
    public function addTax(Tax $tax): ModelInterface
    {
        return $this->addResource(self::RESOURCE_TAXES, $tax);
    }

    /**
     * @param Tax $tax
     * @return ModelInterface|Tax
     * @throws WsException
     */
    public function updateTax(Tax $tax): ModelInterface
    {
        return $this->updateResource(self::RESOURCE_TAXES, $tax);
    }

    public function deleteTax(int $id): void
    {
        $this->deleteResource(self::RESOURCE_TAXES, $id);
    }

    /**
     * @param array|null $filters
     * @return array|TaxRule[]
     */
    public function getTaxRules(array $filters = null): array
    {
        return $this->getResources(self::RESOURCE_TAX_RULES, $filters);
    }

    /**
     * @param array|null $filters
     * @return array|TaxRuleGroup[]
     */
    public function getTaxRuleGroups(array $filters = null): array
    {
        return $this->getResources(self::RESOURCE_TAX_RULE_GROUPS, $filters);
    }

    /**
     * @param int $id
     * @return ModelInterface|TaxRuleGroup|null
     */
    public function getTaxRuleGroup(int $id)
    {
        return $this->getResource(self::RESOURCE_TAX_RULE_GROUPS, $id);
    }

    /**
     * @param array|null $filters
     * @return array|Country[]
     */
    public function getCountries(array $filters = null): array
    {
        return $this->getResources(self::RESOURCE_COUNTRIES, $filters);
    }

    /**
     * @param array|null $filters
     * @return array|ProductFeature[]
     */
    public function getProductFeatures(array $filters = null): array
    {
        return $this->getResources(self::RESOURCE_PRODUCT_FEATURES, $filters);
    }

    /**
     * @param string $name
     * @return ModelInterface|ProductFeature|null
     */
    public function getProductFeatureByName(string $name): ?ModelInterface
    {
        return $this->getResourceByFieldValue(self::RESOURCE_PRODUCT_FEATURES, 'name', $name);
    }

    /**
     * @param ProductFeature $productFeature
     * @return ModelInterface|ProductFeature
     * @throws WsException
     */
    public function addProductFeature(ProductFeature $productFeature): ModelInterface
    {
        return $this->addResource(self::RESOURCE_PRODUCT_FEATURES, $productFeature);
    }

    /**
     * @param array|null $filters
     * @return array|ProductFeatureValue[]
     */
    public function getProductFeatureValues(array $filters = null): array
    {
        return $this->getResources(self::RESOURCE_PRODUCT_FEATURE_VALUES, $filters);
    }

    /**
     * @param int $id
     * @return ModelInterface|ProductFeatureValue|null
     */
    public function getProductFeatureValue(int $id): ?ProductFeatureValue
    {
        return $this->getResource(self::RESOURCE_PRODUCT_FEATURE_VALUES, $id);
    }

    /**
     * @param ProductFeatureValue $productFeatureValue
     * @return ModelInterface
     * @throws WsException
     */
    public function updateProductFeatureValue(ProductFeatureValue $productFeatureValue): ModelInterface
    {
        return $this->updateResource(self::RESOURCE_PRODUCT_FEATURE_VALUES, $productFeatureValue);
    }

    public function getProductFeatureValueByName(int $featureId, string $value): ?ProductFeatureValue
    {
        $values = $this->getProductFeatureValues(['id_feature' => $featureId, 'value' => $value]);
        if (count($values) > 0) {
            return $values[0];
        }

        return null;
    }

    /**
     * @param ProductFeatureValue $productFeatureValue
     * @return ModelInterface|ProductFeatureValue
     * @throws WsException
     */
    public function addProductFeatureValue(ProductFeatureValue $productFeatureValue): ModelInterface
    {
        return $this->addResource(self::RESOURCE_PRODUCT_FEATURE_VALUES, $productFeatureValue);
    }

    /**
     * @param array|null $filters
     * @return array|ProductOption[]
     */
    public function getProductOptions(array $filters = null): array
    {
        return $this->getResources(self::RESOURCE_PRODUCT_OPTIONS, $filters);
    }

    /**
     * @param int $id
     * @return ModelInterface|ProductOption|null
     */
    public function getProductOption(int $id): ?ModelInterface
    {
        return $this->getResource(self::RESOURCE_PRODUCT_OPTIONS, $id);
    }

    /**
     * @param string $name
     * @return ModelInterface|ProductOption|null
     */
    public function getProductOptionByName(string $name): ?ModelInterface
    {
        return $this->getResourceByFieldValue(self::RESOURCE_PRODUCT_OPTIONS, 'name', $name);
    }

    /**
     * @param ProductOption $productOption
     * @return ModelInterface|ProductOption
     * @throws WsException
     */
    public function addProductOption(ProductOption $productOption): ModelInterface
    {
        return $this->addResource(self::RESOURCE_PRODUCT_OPTIONS, $productOption);
    }

    /**
     * @param array|null $filters
     * @return array|ProductOptionValue[]
     */
    public function getProductOptionValues(array $filters = null): array
    {
        return $this->getResources(self::RESOURCE_PRODUCT_OPTION_VALUES, $filters);
    }

    /**
     * @param int $id
     * @return ModelInterface|ProductOption|null
     */
    public function getProductOptionValue(int $id): ?ProductOptionValue
    {
        return $this->getResource(self::RESOURCE_PRODUCT_OPTION_VALUES, $id);
    }

    public function getProductOptionValueByValue(int $optionId, string $value): ?ProductOptionValue
    {
        $values = $this->getProductOptionValues(['id_option' => $optionId, 'value' => $value]);
        if (count($values) > 0) {
            return $values[0];
        }

        return null;
    }

    /**
     * @param ProductOptionValue $productOptionValue
     * @return ModelInterface|ProductOptionValue
     * @throws WsException
     */
    public function addProductOptionValue(ProductOptionValue $productOptionValue): ModelInterface
    {
        return $this->addResource(self::RESOURCE_PRODUCT_OPTION_VALUES, $productOptionValue);
    }

    /**
     * @param ProductOptionValue $productOptionValue
     * @return ModelInterface
     * @throws WsException
     */
    public function updateProductOptionValue(ProductOptionValue $productOptionValue): ModelInterface
    {
        return $this->updateResource(self::RESOURCE_PRODUCT_OPTION_VALUES, $productOptionValue);
    }

    /**
     * @param int $id
     * @return ModelInterface|Tag
     */
    public function getTag(int $id): ?ModelInterface
    {
        return $this->getResource(self::RESOURCE_TAGS, $id);
    }

    public function getTags(array $filters = null): array
    {
        return $this->getResources(self::RESOURCE_TAGS, $filters);
    }

    private function getResources(string $resourceName, array $filters = null, string $endpointOverride = null, string $singleResourceNameOverride = null): array
    {
        $url = $this->constructUrl($endpointOverride ?? $resourceName);
        if ($filters !== null) {
            $filtersStrings = [];
            foreach ($filters as $key => $value) {
                $valueString = $value;
                if (is_array($value)) {
                    $valueString = '[' . implode('|', $value) . ']';
                }
                $filtersStrings[] = "filter[{$key}]={$valueString}";
            }
            foreach ($filtersStrings as $key => $filterString) {
                $url .= $key === 0 ? '?' : '&';
                $url .= $filterString;
            }
        }

        $response = $this->getJson($url);

        $resources = [];
        if (isset($response[$resourceName])) {
            foreach ($response[$resourceName] as $item) {
                $resources[] = $this->getResource($resourceName, $item['id'], $singleResourceNameOverride);
            }
        }

        return $resources;
    }

    private function getResource(string $resourceName, int $id, string $singleResourceNameOverride = null): ?ModelInterface
    {
        $url = $this->constructUrl($singleResourceNameOverride ?? $resourceName, $id);
        $array = $this->getJson($url);
        if ($array === null) {
            return null;
        }

        $modelClass = self::MODEL[$resourceName];

        if (!isset($array[self::SINGLE[$resourceName]])) {
            return null;
        }

        return $modelClass::fromArray($array[self::SINGLE[$resourceName]]);
    }

    private function getResourceByFieldValue(string $resourceName, string $fieldName, $fieldValue): ?ModelInterface
    {
        $fieldName = urlencode($fieldName);
        $fieldValue = urlencode($fieldValue);
        $url = $this->constructUrl($resourceName) . "?filter[{$fieldName}]={$fieldValue}";
        $array = $this->getJson($url);
        if (!isset($array[$resourceName][0]['id'])) {
            return null;
        }

        $id = $array[$resourceName][0]['id'];
        $array = $this->getJson($this->constructUrl($resourceName, $id));

        $modelClass = self::MODEL[$resourceName];

        return $modelClass::fromArray($array[self::SINGLE[$resourceName]]);
    }

    /**
     * @param string $resourceName
     * @param ModelInterface $resource
     * @return ModelInterface
     * @throws WsException
     */
    private function addResource(string $resourceName, ModelInterface $resource): ModelInterface
    {
        $blank = $this->getBlank($resourceName);
        $xml = $resource->toXml($blank);

        try {
            $response = $this->post($resourceName, $xml);
            $modelClass = self::MODEL[$resourceName];

            return $modelClass::fromArray($response[self::SINGLE[$resourceName]]);
        } catch (BadResponseException $e) {
            $data = json_decode($e->getResponse()->getBody()->getContents(), true);
            if (!isset($data['errors'])) {
                throw $e;
            }

            throw new WsException($this->createErrorResponse($data));
        }
    }

    /**
     * @param string $resourceName
     * @param ModelInterface $model
     * @return ModelInterface
     * @throws WsException
     */
    private function updateResource(string $resourceName, ModelInterface $model): ModelInterface
    {
        if ($model->getId() === null) {
            throw new WsException('Cannot update, model must have id');
        }

        $blank = $this->getBlank($resourceName);
        $xml = $model->toXml($blank);

        $array = $this->put($resourceName, $xml);
        $modelClass = self::MODEL[$resourceName];

        return $modelClass::fromArray($array[self::SINGLE[$resourceName]]);
    }

    private function deleteResource(string $resourceName, int $id): void
    {
        $this->send('delete', $this->constructUrl($resourceName, $id));
    }

    private function constructUrl(string $resource, int $id = null): string
    {
        $url = $this->httpScheme . '://' . $this->key . '@' . $this->url . '/' . $resource;

        if ($id !== null) {
            $url .= '/' . $id;
        }

        return $url;
    }

    private function getJson(string $url): ?array
    {
        try {
            $response = $this->send('get', $url, [
                RequestOptions::HEADERS => [
                    'Io-Format' => 'JSON',
                    'Output-Format' => 'JSON',
                ],
            ]);

            return json_decode($response->getBody()->getContents(), true);
        } catch (ClientException $e) {
            if ($e->getCode() === 404) {
                return null;
            }

            throw $e;
        }
    }

    private function createErrorResponse(array $data): string
    {
        $messages = [];
        foreach ($data['errors'] as $error) {
            $message = $error['message'] ?? '';
            $code = $error['code'] ?? '';
            $messages[] = "{$message} (code {$code})";
        }

        return implode('; ', $messages);
    }

    /**
     * @param string $url
     * @return SimpleXMLElement|stdClass
     */
    private function getXml(string $url): SimpleXMLElement
    {
        $response = $this->send('get', $url);

        return new SimpleXMLElement($response->getBody()->getContents());
    }

    private function getBlank(string $resource): SimpleXMLElement
    {
        $url = $this->constructUrl($resource) . '?schema=blank';

        $response = $this->send('get', $url);

        return new SimpleXMLElement($response->getBody()->getContents());
    }

    private function post(string $resource, SimpleXMLElement $payload): array
    {
        $response = $this->send('post', $this->constructUrl($resource), [
            RequestOptions::HEADERS => [
                'Io-Format' => 'JSON',
                'Output-Format' => 'JSON',
            ],
            RequestOptions::BODY => $payload->asXML(),
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    private function put(string $resource, SimpleXMLElement $payload): array
    {
        $response = $this->send('put', $this->constructUrl($resource), [
            RequestOptions::HEADERS => [
                'Io-Format' => 'JSON',
                'Output-Format' => 'JSON',
            ],
            RequestOptions::BODY => $payload->asXML(),
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }
}
