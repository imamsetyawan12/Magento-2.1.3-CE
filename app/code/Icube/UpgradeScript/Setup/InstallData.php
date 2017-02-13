<?php
/**
 * Copyright © 2015 iCube. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Icube\UpgradeScript\Setup;
use Magento\Cms\Model\Page;
use Magento\Cms\Model\PageFactory;
use Magento\Cms\Model\BlockFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
/**
 * @codeCoverageIgnore
 */
class InstallData implements InstallDataInterface
{
    /**
     * Page factory
     *
     * @var PageFactory
     */
    private $pageFactory;
    /**
     * @var BlockFactory
     */
    protected $blockFactory;
    /**
     * Init
     *
     * @param PageFactory $pageFactory
     */
    public function __construct(
        BlockFactory $modelBlockFactory,
        PageFactory $pageFactory)
    {
        $this->pageFactory = $pageFactory;
        $this->blockFactory = $modelBlockFactory;
    }
    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $cmsBlockContent = <<<EOD
<div class="footer-links-company-info">
    <div class="column-one">
        <ul>
            <li><a>About Tiok</a></li>
        </ul>
    </div>
    <div class="column-two">
        <ul>
            <li><a>Hello World</a></li>
        </ul>
    </div>
</div>
EOD;
        $cmsBlock = [
            'title' => 'Block One',
            'identifier' => 'block-one',
            'content' => $cmsBlockContent,
            'is_active' => 1,
            'stores' => 0,
        ];
        /** @var \Magento\Cms\Model\Block $block */
        $block = $this->blockFactory->create();
        $block->setData($cmsBlock)->save();
        $cmsBlockContent = <<<EOD
<div class="social-links">
    <ul>
        <li><a href="#" class="fb"></a></li>
        <li><a href="#" class="twitter"></a></li>
        <li><a href="#" class="linked"></a></li>
        <li><a href="#" class="youtube"></a></li>
    </ul>
</div>
EOD;
        $cmsBlock = [
            'title' => 'CMS Social Links',
            'identifier' => 'cms-social-links',
            'content' => $cmsBlockContent,
            'is_active' => 1,
            'stores' => 0,
        ];
        /** @var \Magento\Cms\Model\Block $block */
        $block = $this->blockFactory->create();
        $block->setData($cmsBlock)->save();
    }
    /**
     * Create page
     *
     * @return Page
     */
    public function createPage()
    {
        return $this->pageFactory->create();
    }
}