<?php
namespace MVC\LIBS;
class Template {
    private $_templateParts,
            $_actionViewPath,
            $_data;

    public function __construct(array $parts){
        $this->_templateParts = $parts;
    }
    public function setACtionViewFile($file){
        $this->_actionViewPath = $file;
    }
    public function setTemplateData($data){
        $this->_data = $data;
    }
    private function _renderTemplateHeaderStart(){
        extract($this->_data);
        require_once TEMPLATE_PATH . 'templateheaderstart.php';
    }
    private function _renderHeaderResources(){
        $output = '';
        if(!array_key_exists('header_resources',$this->_templateParts)){
                trigger_error("Sorry, You must Fill Header Resources");
        }else{
            $headerResources = $this->_templateParts['header_resources'];
            $css = $headerResources['css'];
            if(!empty($css)){
                foreach($css as $cssKeys => $file){
                    $output .= "<link rel='stylesheet' href='". $file ."'>";
                }
            }
            $js = $headerResources['js'];
            if(!empty($js)){
                foreach($js as $jsKeys => $file){
                    $output .= "<script src='" . $file . "'></script>";
                }
            }
            echo $output;
        }   
    }
    private function _renderTemplateHeaderEnd(){
        extract($this->_data);
        require_once TEMPLATE_PATH . 'templateheaderend.php';
    }
    private function _renderTemplateBlocks(){
        if(!array_key_exists('template',$this->_templateParts)){
            trigger_error("Sorry, You must Fill template Blocks");
        }else{
            $template = $this->_templateParts['template'];
            if(!empty($template)){
                extract($this->_data);
                foreach($template as $templateKeys => $file){
                    if($templateKeys === ':view'){
                        require_once $this->_actionViewPath;
                    }else{
                        require_once $file;
                    }
                }
            }
        }
    }
    private function _renderFooterResources(){
        $output = '';
        if(!array_key_exists('footer_resources',$this->_templateParts)){
                trigger_error("Sorry, You must Fill footer Resources");
        }else{
            $footerResources = $this->_templateParts['footer_resources'];
            if(!empty($footerResources)){
                foreach($footerResources as $footerResourcesKey => $file){
                    $output .= "<script src='" . $file . "'></script>";
                }
            }
            echo $output;
        }     
    }
    private function _renderTemplateFooter(){
        extract($this->_data);
        require_once TEMPLATE_PATH . 'templatefooter.php';
    }

    public function renderApp(){
       $this->_renderTemplateHeaderStart();
       $this->_renderHeaderResources();
       $this->_renderTemplateHeaderEnd();
       $this->_renderTemplateBlocks();
       $this->_renderFooterResources();
       $this->_renderTemplateFooter();
    }
}