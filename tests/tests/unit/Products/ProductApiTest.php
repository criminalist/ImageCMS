<?php

require_once realpath(dirname(__FILE__) . '/../../..') . '/enviroment.php';

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.1 on 2014-01-30 at 13:17:26.
 */
class ProductApiTest extends PHPUnit_Framework_TestCase {

    /**
     * @var ProductApi
     */
    protected $object;
    protected $testDbProduct;
    protected $ci;
    protected $testData;
    protected $testDbProductI18N;
    protected $testDbProductVariant;

    public function getFirstProduct() {
        
    }

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = \Products\ProductApi::getInstance();
        $this->ci = & get_instance();
        $this->testDbProduct = $this->ci->db->limit(1)->get('shop_products')->row_array();
        $this->testDbProductI18N = $this->ci->db->limit(1)->get('shop_products_i18n')->row_array();
        $this->testDbProductVariant = $this->ci->db->where('product_id', $this->testDbProduct['id'])->limit(1)->get('shop_product_variants')->row_array();
        $this->testData = array(
            'product_name' => 'testName',
            'active' => 1,
            'variant_name' => 'testVariantName',
            'price_in_main' => 1,
            'currency' => 1,
            'number' => 1,
            'stock' => 1,
            'brand_id' => 1,
            'category_id' => 1,
            'additional_categories_ids' => array(1, 2),
            'short_description' => 'testShortDescription',
            'full_description' => 'testFullDescription',
            'old_price' => 1,
            'tpl' => 'testTpl',
            'url' => 'testUrl',
            'meta_title' => 'testMetaTitle',
            'meta_keywords' => 'testMetaKeywords',
            'meta_description' => 'testMetaDescription',
            'enable_comments' => 'testEnableComments',
            'related_products' => '96,98',
            'created' => time(),
            'updated' => time()
        );
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        
    }

    /**
     * @covers ProductApi::getError
     * @todo   Implement testGetError().
     */
    public function testGetError() {
        $this->assertEmpty($this->object->getError());
    }

    /**
     * @covers ProductApi::addProduct
     * @todo   Implement testAddProduct().
     */
    public function testAddProduct() {
        $data = array(
            'product_name' => 'Name',
            'active' => 'Active',
            'variant_name' => 'variantsName',
            'price_in_main' => 10,
            'currency' => 2,
            'number' => 'variantsNumber',
            'stock' => 1,
            'brand_id' => '',
            'category_id' => 36,
            'additional_categories_ids' => 'Categories',
            'short_description' => 'ShortDescription',
            'full_description' => 'FullDescription',
            'old_price' => 'OldPrice',
            'tpl' => 'tpl',
            'url' => 'Url',
            'meta_title' => 'MetaTitle',
            'meta_description' => 'MetaDescription',
            'meta_keywords' => 'MetaKeywords',
            'related_products' => 'RelatedProducts',
            'enable_comments' => 'EnableComments',
            'created' => 'Created' ? strtotime('Created') : '',
            'updated' => time(),
        );
        $model = $this->object->addProduct($data);
        $this->assertEmpty($this->object->getError());

        $this->object->deleteProduct($model->getId());
        $this->assertEmpty($this->object->getError());
    }

    /**
     * @covers ProductApi::addProductI18N
     * @todo   Implement testAddProductI18N().
     */
    public function testAddProductI18N() {
        $data = array(
            'product_name' => 'Name',
            'active' => 'Active',
            'variant_name' => 'variantsName',
            'price_in_main' => 10,
            'currency' => 2,
            'number' => 'variantsNumber',
            'stock' => 1,
            'brand_id' => '',
            'category_id' => 36,
            'additional_categories_ids' => 'Categories',
            'short_description' => 'ShortDescription',
            'full_description' => 'FullDescription',
            'old_price' => 'OldPrice',
            'tpl' => 'tpl',
            'url' => 'Url',
            'meta_title' => 'MetaTitle',
            'meta_description' => 'MetaDescription',
            'meta_keywords' => 'MetaKeywords',
            'related_products' => 'RelatedProducts',
            'enable_comments' => 'EnableComments',
            'created' => 'Created' ? strtotime('Created') : '',
            'updated' => time(),
        );
        $model = $this->object->addProduct($data);
        $this->assertEmpty($this->object->getError());

        $this->object->addProductI18N($model->getId(), $data, 'ua');
        $this->assertEmpty($this->object->getError());

        $this->object->deleteProduct($model->getId());
        $this->assertEmpty($this->object->getError());
    }

    /**
     * @covers ProductApi::addVariant
     * @todo   Implement testAddVariant().
     */
    public function testAddVariant() {
        $data = array(
            'product_name' => 'Name',
            'active' => 'Active',
            'variant_name' => 'variantsName',
            'price_in_main' => 10,
            'currency' => 2,
            'number' => 'variantsNumber',
            'stock' => 1,
            'brand_id' => '',
            'category_id' => 36,
            'additional_categories_ids' => 'Categories',
            'short_description' => 'ShortDescription',
            'full_description' => 'FullDescription',
            'old_price' => 'OldPrice',
            'tpl' => 'tpl',
            'url' => 'Url',
            'meta_title' => 'MetaTitle',
            'meta_description' => 'MetaDescription',
            'meta_keywords' => 'MetaKeywords',
            'related_products' => 'RelatedProducts',
            'enable_comments' => 'EnableComments',
            'created' => 'Created' ? strtotime('Created') : '',
            'updated' => time(),
        );
        $model = $this->object->addProduct($data);
        $this->assertEmpty($this->object->getError());

        $this->object->addVariant($model->getId(), $data, 'ru');
        $this->assertEmpty($this->object->getError());

        $this->object->deleteProduct($model->getId());
        $this->assertEmpty($this->object->getError());
    }

    /**
     * @covers ProductApi::addVariantI18N
     * @todo   Implement testAddVariantI18N().
     */
    public function testAddVariantI18N() {
        $data = array(
            'product_name' => 'Name',
            'active' => 'Active',
            'variant_name' => 'variantsName',
            'price_in_main' => 10,
            'currency' => 2,
            'number' => 'variantsNumber',
            'stock' => 1,
            'brand_id' => '',
            'category_id' => 36,
            'additional_categories_ids' => 'Categories',
            'short_description' => 'ShortDescription',
            'full_description' => 'FullDescription',
            'old_price' => 'OldPrice',
            'tpl' => 'tpl',
            'url' => 'Url',
            'meta_title' => 'MetaTitle',
            'meta_description' => 'MetaDescription',
            'meta_keywords' => 'MetaKeywords',
            'related_products' => 'RelatedProducts',
            'enable_comments' => 'EnableComments',
            'created' => 'Created' ? strtotime('Created') : '',
            'updated' => time(),
        );
        $model = $this->object->addProduct($data);
        $this->assertEmpty($this->object->getError());

        $this->object->addVariantI18N($model->getId(), $data, 'ua');
        $this->assertEmpty($this->object->getError());

        $this->object->deleteProduct($model->getId());
        $this->assertEmpty($this->object->getError());
    }

    /**
     * @covers ProductApi::updateProduct
     * @todo   Implement testUpdateProduct().
     */
    public function testUpdateProduct() {
//        var_dumps($this->testDbProduct);
        if ($this->testDbProduct) {

            $this->assertFalse($this->object->updateProduct());

            if (!$this->object->updateProduct()) {
                $this->assertTrue($this->object->getError() === lang('You did not specified product id'));
            }

            $this->assertFalse($this->object->updateProduct($this->testDbProduct['id']));

            if (!$this->object->updateProduct($this->testDbProduct['id'])) {
                $this->assertTrue($this->object->getError() === lang('You did not specified data array'));
            }

            $result = $this->object->updateProduct($this->testDbProduct['id'], $this->testData, 'ru');

            $this->assertTrue($result instanceof \SProducts);

            $this->assertEquals($this->testDbProduct['id'], $result->getId());

            $this->assertEquals($this->testData['product_name'], $result->getName());

            $this->assertEquals($this->testData['tpl'], $result->getTpl());
        } else {
            $this->markTestSkipped('No products in db');
        }
    }

    /**
     * @covers ProductApi::updateProductI18N
     * @todo   Implement testUpdateProductI18N().
     */
    public function testUpdateProductI18N() {
        $result = $this->object->updateProductI18N();

        $this->assertFalse($result);

        if (!$result) {
            $this->assertTrue($this->object->getError() === lang('You did not specified product id'));
        }

        $result = $this->object->updateProductI18N($this->testDbProductI18N['id']);

        $this->assertFalse($result);

        if (!$result) {
            $this->assertTrue($this->object->getError() === lang('You did not specified data array'));
        }

        $result = $this->object->updateProductI18N($this->testDbProductI18N['id'], 'rest data');

        $this->assertFalse($result);

        if (!$result) {
            $this->assertTrue($this->object->getError() === lang('Second parameter $data must be array'));
        }

        $result = $this->object->updateProductI18N($this->testDbProductI18N['id'], $this->testData);

        $this->assertTrue($result instanceof \SProductsI18n);

        $this->assertEquals($this->testDbProductI18N['id'], $result->getId());

        $this->assertEquals($this->testData['product_name'], $result->getName());
    }

    /**
     * @covers ProductApi::updateVariant
     * @todo   Implement testUpdateVariant().
     */
    public function testUpdateVariant() {
        $result = $this->object->updateVariant();

        $this->assertFalse($result);

        if (!$result) {
            $this->assertTrue($this->object->getError() === lang('You did not specified product id'));
        }

        $result = $this->object->updateVariant($this->testDbProduct['id']);

        $this->assertFalse($result);

        if (!$result) {
            $this->assertTrue($this->object->getError() === lang('You did not specified data array'));
        }

        $result = $this->object->updateVariant($this->testDbProduct['id'], 'rest data');

        $this->assertFalse($result);

        if (!$result) {
            $this->assertTrue($this->object->getError() === lang('Second parameter $data must be array'));
        }

        $result = $this->object->updateVariant($this->testDbProduct['id'], $this->testData);

        $this->assertTrue($result instanceof \SProductVariants);

        $this->assertEquals($this->testDbProduct['id'], $result->getProductId());

        $this->assertEquals($this->testDbProductVariant['id'], $result->getId());

        $this->assertEquals($this->testData['number'], $result->getNumber());
    }

    /**
     * @covers ProductApi::updateVariantI18N
     * @todo   Implement testUpdateVariantI18N().
     */
    public function testUpdateVariantI18N() {
        $result = $this->object->updateVariantI18N();

        $this->assertFalse($result);

        if (!$result) {
            $this->assertTrue($this->object->getError() === lang('You did not specified product variant id'));
        }

        $result = $this->object->updateVariantI18N($this->testDbProductVariant['id']);

        $this->assertFalse($result);

        if (!$result) {
            $this->assertTrue($this->object->getError() === lang('You did not specified data array'));
        }

        $result = $this->object->updateVariantI18N($this->testDbProductVariant['id'], 'rest data');

        $this->assertFalse($result);

        if (!$result) {
            $this->assertTrue($this->object->getError() === lang('Second parameter $data must be array'));
        }

        $result = $this->object->updateVariantI18N($this->testDbProductVariant['id'], $this->testData);

        $this->assertTrue($result instanceof \SProductVariantsI18n);

        $this->assertEquals($this->testDbProductVariant['id'], $result->getId());

        $this->assertEquals($this->testData['variant_name'], $result->getName());
    }

    /**
     * @covers ProductApi::deleteProduct
     * @todo   Implement testDeleteProduct().
     */
    public function testDeleteProduct() {
        $result = $this->object->deleteProduct();

        $this->assertFalse($result);

        if (!$result) {
            $this->assertTrue($this->object->getError() === lang('You did not specified product id'));
        }

//        $result = $this->object->deleteProduct($this->testDbProduct['id']);
//        $this->assertTrue($result);
    }

    /**
     * @covers ProductApi::deleteProductKits
     * @todo   Implement testDeleteProductKits().
     */
    public function testDeleteProductKits() {
        $result = $this->object->deleteProductKits($this->testDbProduct['id']);

        $this->assertTrue($result);

        $result = $this->object->deleteProductKits();

        $this->assertFalse($result);

        if (!$result) {
            $this->assertTrue($this->object->getError() === lang('You did not specified product id'));
        }
    }

    /**
     * @covers ProductApi::deleteProductOrdes
     * @todo   Implement testDeleteProductOrdes().
     */
    public function testDeleteProductOrdes() {
        $result = $this->object->deleteProductOrdes($this->testDbProduct['id']);

        $this->assertTrue($result);

        $result = $this->object->deleteProductOrdes();

        $this->assertFalse($result);

        if (!$result) {
            $this->assertTrue($this->object->getError() === lang('You did not specified product id'));
        }
    }

    /**
     * @covers ProductApi::deleteProductNotifications
     * @todo   Implement testDeleteProductNotifications().
     */
    public function testDeleteProductNotifications() {
        $result = $this->object->deleteProductNotifications($this->testDbProduct['id']);

        $this->assertTrue($result);

        $result = $this->object->deleteProductNotifications();

        $this->assertFalse($result);

        if (!$result) {
            $this->assertTrue($this->object->getError() === lang('You did not specified product id'));
        }
    }

    /**
     * @covers ProductApi::getProductProperties
     * @todo   Implement testGetProductProperties().
     */
    public function testGetProductProperties() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers ProductApi::setProductPropertyValue
     * @todo   Implement testSetProductPropertyValue().
     */
    public function testSetProductPropertyValue() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers ProductApi::deleteProductPropertyValue
     * @todo   Implement testDeleteProductPropertyValue().
     */
    public function testDeleteProductPropertyValue() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers ProductApi::setProductAdditionalCategories
     * @todo   Implement testSetProductAdditionalCategories().
     */
    public function testSetProductAdditionalCategories() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers ProductApi::saveProductAdditionalImage
     * @todo   Implement testSaveProductAdditionalImage().
     */
    public function testSaveProductAdditionalImage() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

}
