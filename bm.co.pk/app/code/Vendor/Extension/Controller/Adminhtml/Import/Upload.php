<?php
namespace Vendor\Extension\Controller\Adminhtml\Import;
use Exception;
use Vendor\Extension\Model\ImageUploader;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Filesystem\DirectoryList;
class Upload extends \Magento\Backend\App\Action
 
{
    /**
     * Image uploader
     *
     * @var ImageUploader
     */
    protected $imageUploader;
 
    /**
     * Upload constructor.
     *
     * @param Context $context
     * @param ImageUploader $imageUploader
     */
    public function __construct(
        Context $context,
        DirectoryList $directoryList,
        \Magento\Framework\File\Csv $csvProcessor,
        \Vendor\Extension\Model\CustomFactory $custom,
        \Magento\Framework\App\ResourceConnection $resource,
        ImageUploader $imageUploader
    ) {
        parent::__construct($context);
        $this->csvProcessor = $csvProcessor;
        $this->resourceCon = $resource->getConnection();
        $this->_custom = $custom;
        $this->directoryList = $directoryList;
        $this->imageUploader = $imageUploader;
    }
    /**
     * Upload file controller action
     *
     * @return ResultInterface
     */
    public function getCollection(){

        return $this->_custom->create()->getCollection();

    }
    public function execute()
    {  
      
        $imageId = $this->_request->getParam('param_name');
        $getdata=$this->getCollection()->getData();
        //echo"<pre>";
        //print_r($getdata);
        //die("");
 
        try {
            $result = $this->imageUploader->saveFileToTmpDir($imageId);
            $filePath = $result['url'];
            $filePath = explode('media', $filePath)[1];
           // print_r($filePath);
            //die("dd");
            // http://bm.co.pk/media/codextblog/tmp/feature/test_19.csv

            $path = $this->directoryList->getPath($this->directoryList::MEDIA).$filePath;
          
            $importProductRawData = $this->csvProcessor->getData($path);
            $model = $this->_custom->create();
            $count = 0;
            foreach ($importProductRawData as $rowIndex => $dataRow)
            {
                if($rowIndex > 0) 
                {
                        $x=0;

                    $model->setData(
                        [   
                          
                            'name'=> $dataRow[1],
                            'content'=> $dataRow[2],
                            'title'=> $dataRow[3],
                            'author'=> $dataRow[4],
                            'description' =>$dataRow[5]
                        ]);

                        foreach ($getdata as $value) 
                        {
                            $y = $value;
    //
                    
                            if ($y['author'] == $dataRow[4] && $y['description'] == $dataRow[5])
                            {
                            
                                $x++;
                            }
                        }
                        if($x==0)
                        {
                           
                            $saveData = $model->save();
                        }

                       


                }

                
                            
                            
                            
            } 

           if($x==0)
         {
              if($saveData)
             {
    
                $this->messageManager->addSuccess( __('Insert data Successfully !') );

            }
         }
        else{
            $this->messageManager->addSuccess( __('Data already exist !') );


        }

        }
        catch (Exception $e)
         {
          $result = ['error' => $e->getMessage(), 'errorcode' => $e->getCode()];
         }
        return $this->resultFactory->create(ResultFactory::TYPE_JSON)->setData($result);
      }
     }