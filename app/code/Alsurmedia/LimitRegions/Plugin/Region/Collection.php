<?php
namespace Alsurmedia\LimitRegions\Plugin\Region;

/**
 * Class Collection
 */
class Collection
{

	/**
	 * @param \Magento\Directory\Model\ResourceModel\Region\Collection $subject
	 * @param $result
	 * @return mixed
	 */
	function afterToOptionArray(
		\Magento\Directory\Model\ResourceModel\Region\Collection $subject,
		$result
	) {

		// 138 Baleares
		// 145 Ceuta
		// 157 Las palmas
		// 163 Melilla
		// 170 Tenerife
		$excludedRegions = [138, 145, 157, 163, 170];
		foreach ($excludedRegions as $excludedRegion) {
			$result = $this->removeElementWithValue($result, 'value', $excludedRegion);
		}

		return $result;
	}

	/**
	 * @param $array
	 * @param $key
	 * @param $value
	 * @return mixed
	 */
	function removeElementWithValue($array, $key, $value){
		foreach($array as $subKey => $subArray){
			if($subArray[$key] == $value){
				unset($array[$subKey]);
			}
		}
		return $array;
	}

}
