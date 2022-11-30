<?php
 
namespace Vendor\Extension\Controller\Adminhtml\Add;
 
class Add extends \Magento\Backend\App\Action
 
{
 
    protected $resultPageFactory;
 
    public function __construct(
 
        \Magento\Backend\App\Action\Context $context,
 
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
 
    ) {
 
        parent::__construct($context);
 
        $this->resultPageFactory = $resultPageFactory;
 
    }
    protected function _isAllowed()
{
 return $this->_authorization->isAllowed('Magento_Customer::manage');
}
 
    public function execute()
 
    {
 
        $resultPage = $this->resultPageFactory->create();
 
        $resultPage->getConfig()->getTitle()->prepend(__('Ui Form'));
 
        return $resultPage;
 
    }
 
}