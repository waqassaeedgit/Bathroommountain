<?php
namespace Vendor\Extension\Controller\Adminhtml\Saveimport;

use Magento\Framework\Filesystem\DirectoryList;
 
class ReadCsv extends \Magento\Backend\App\Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Vendor_Extension::manage_pincodes';

    /**
     * Image uploader
     *
     * @var \Ktpl\BannerSlider\BannerImageUploader
     */
    private $csvUploader;

    /**
     * @var \Magento\Framework\Filesystem
     */
    protected $_filesystem;

    /**
     * Store manager
     *
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $_storeManager;

    /**
     * CSV Processor
     *
     * @var \Magento\Framework\File\Csv
     */
    protected $csvProcessor;

    /**
     * @param Magento\Backend\App\Action\Context $context
     * @param Magento\Store\Model\StoreManagerInterface $storeManager
     * @param Magento\Framework\Filesystem $filesystem
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        DirectoryList $directoryList,
        \Magento\Framework\Filesystem\Driver\File $driverFile,
        \Magento\Framework\Filesystem $filesystem,
        \Magento\Framework\File\Csv $csvProcessor,
        \Magento\Framework\Controller\ResultFactory $resultFactory,
        \Vendor\Extension\Model\CustomFactory $custom
    ) {
        $this->custom = $custom;
        $this->resultFactory = $resultFactory;
        $this->_filesystem = $filesystem;
        $this->_storeManager = $storeManager;
        $this->csvProcessor = $csvProcessor;
        $this->directoryList = $directoryList;
        $this->driverFile = $driverFile;
        parent::__construct($context);
    }

    /**
     * Save action
     *
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $this->messageManager->addSuccess(__('Record added / updated successfully.'));
        $redirect = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_REDIRECT);
        return $redirect->setPath('uiexample/index/index');
    }
}