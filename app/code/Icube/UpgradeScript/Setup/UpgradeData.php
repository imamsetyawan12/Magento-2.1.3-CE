<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Icube\UpgradeScript\Setup;

use Magento\Cms\Model\Page;
use Magento\Cms\Model\PageFactory;
use Magento\Cms\Model\BlockFactory;
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

/**
 * @codeCoverageIgnore
 */
class UpgradeData implements UpgradeDataInterface
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
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {

 		if (version_compare($context->getVersion(), '1.0.1', '<')) {
		    
		    /* create cms block: banner-left-homepage */    
            $cmsBlockContent = <<<EOD
<div class="banner-left">
	<div class="banner-wrapper">
		<p>hello</p>
	</div>
</div>
EOD;
			$cmsBlock = $this->createBlock()->load('banner-left-homepage', 'identifier');
		
			if (!$cmsBlock->getId()) {
			    $cmsBlock = [
			        'title' => 'Banner Left Homepage',
			        'identifier' => 'banner-left-homepage',
			        'content' => $cmsBlockContent,
			        'is_active' => 1,
			        'stores' => 0,
			    ];
			    $this->createBlock()->setData($cmsBlock)->save();
			} else {
			    $cmsBlock->setContent($cmsBlockContent)->save();
			}
		    /* end create cms block: banner-left-homepage */    

	   

		}  

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

    /**
     * Create block
     *
     * @return Page
     */
    public function createBlock()
    {
        return $this->blockFactory->create();
    }
}