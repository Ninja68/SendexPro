<?php
/**
 * Create an Item
 */
class vkrmembersCreateProcessor extends modObjectCreateProcessor {
	public $objectType = 'vkrmembers';
	public $classKey = 'vkrmembers';
	public $languageTopics = array('vkroulette');
	public $permission = 'new_document';


	/**
	 * @return bool
	 */
	public function beforeSet() {
		$this->modx->log(3, 'Меня запустили -> vkrmembersCreateProcessor');
		$alreadyExists = $this->modx->getObject('vkrmembers', array(
			'id' => $this->getProperty('id'),
		));
		if ($alreadyExists) {
			$this->modx->error->addField('id', $this->modx->lexicon('vkroulette_item_err_ae'));
		}

		return !$this->hasErrors();
	}

}

return 'vkrmembersCreateProcessor';