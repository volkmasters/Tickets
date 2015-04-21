<?php

class TicketsPublishProcessor extends modProcessor {

	/**
	 * @return array|string
	 */
	public function process() {
		$ids = $this->modx->fromJSON($this->getProperty('ids'));
		if (empty($ids)) {
			return $this->success();
		}

		foreach ($ids as $id) {
			/** @var modProcessorResponse $response */
			$this->modx->error->reset();
			$response = $this->modx->runProcessor('resource/publish', array('id' => $id));
			if ($response->isError()) {
				return $response->getResponse();
			}
		}

		return $this->success();
	}

}

return 'TicketsPublishProcessor';