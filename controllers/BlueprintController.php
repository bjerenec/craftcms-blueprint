<?php
namespace Craft;

/**
 * Blueprint controller
 */
class BlueprintController extends BaseController
{

    public function actionBlueprintIndex()
    {
        $variables['bp'] = Array('sections');
        $variables['bp']['sections'] = $this->_getSectionsAndRelatedFields();
        $variables['bp']['globals'] = $this->_getGlobalSetsAndRelatedFields();
        $variables['bp']['assetsources'] = $this->_getAssetSourcesAndRelatedFields();
        $variables['bp']['assettransforms'] = $this->_getAssetTransforms();
        $variables['bp']['categorygroups'] = $this->_getCategoryGroupsAndRelatedFields();
        $variables['bp']['taggroups'] = $this->_getTagGroupsAndRelatedFields();

        $this->renderTemplate('blueprint/_index', $variables);
    }

    private function _getSectionsAndRelatedFields()
    {
      $sections = craft()->db->createCommand()
            ->select('s.handle, s.name, s.id, s.type, s.template, et.name etName, et.handle etHandle, et.id etId, f.id fId, f.name fName, f.handle fHandle, f.type fType')
            ->from('sections s')
            ->join('entrytypes et', 'et.sectionId=s.id')
            ->join('fieldlayouts fl', 'et.fieldLayoutId=fl.id')
            ->join('fieldlayoutfields flf', 'fl.id=flf.layoutId')
            ->join('fields f', 'flf.fieldId=f.id')
            ->order('s.name, etName, fName')
            ->queryAll();

      return $sections;
    }


    private function _getGlobalSetsAndRelatedFields()
    {
      return $this->__getSourceAndRelatedFields('globalsets');
    }

    private function _getAssetSourcesAndRelatedFields()
    {
      return $this->__getSourceAndRelatedFields('assetsources', 's.name, s.id, s.type');
    }

    private function _getAssetTransforms()
    {
      $transforms = craft()->db->createCommand()
            ->select('id,name, handle, mode, position, height, width, quality')
            ->from('assettransforms')
            ->order('name')
            ->queryAll();
      return $transforms;
    }

    private function _getCategoryGroupsAndRelatedFields()
    {
      return $this->__getSourceAndRelatedFields('categorygroups');
    }

    private function _getTagGroupsAndRelatedFields()
    {
      return $this->__getSourceAndRelatedFields('taggroups');
    }

    private function __getSourceAndRelatedFields($sourceName, $sourceFields = 's.name, s.id, s.handle')
    {
      $sources = craft()->db->createCommand()
            ->select($sourceFields . ', f.id fId, f.name fName, f.handle fHandle, f.type fType')
            ->from("$sourceName s")
            ->join('fieldlayouts fl', 's.fieldLayoutId=fl.id')
            ->join('fieldlayoutfields flf', 'fl.id=flf.layoutId')
            ->join('fields f', 'flf.fieldId=f.id')
            ->order('s.name, fName')
            ->queryAll();

      return $sources;
    }
}
