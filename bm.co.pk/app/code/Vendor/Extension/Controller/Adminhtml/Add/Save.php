<?php
 
namespace Vendor\Extension\Controller\Adminhtml\Add;
 
class Save extends \Magento\Backend\App\Action
 
{
 
    protected $customFactory;
 
    protected $adapterFactory;
 
    protected $uploader;
 
    public function __construct(
 
        \Magento\Backend\App\Action\Context $context,
 
        \Vendor\Extension\Model\CustomFactory $customFactory
 
    ) {
 
        parent::__construct($context);
 
        $this->customFactory = $customFactory;
 
    }

    protected function _isAllowed()
     {
        return $this->_authorization->isAllowed('Vendor_Extension::create');
    }
 
    public function execute()
 
    {
        
 
        $data = $this->getRequest()->getPostValue();
        
 
        try {
 
            $model = $this->customFactory->create();
 
$model->addData([
 
    "name" => $data['name'],
 
    "content" => $data['content'],
 
    "title" => $data['title'],

    "author" => $data['author'],

    "description" => $data['description'],

    
 
]);

 
$saveData = $model->save();
 
if($saveData){
 
    $this->messageManager->addSuccess( __('Insert data Successfully !') );
 
}
 
        }catch (\Exception $e) {
 
            $this->messageManager->addError(__($e->getMessage()));
 
        }
 
        $this->_redirect('uiexample/index/index');
 
    }
 
}