 <?php
	
	/**
     * Get array of data by its id (data should be parsed before)
     *
     * @param int $id
     * @return array|null
     */
		function get_data_by_id($id,$arr) {
        $id = intval($id);
        if (isset($arr[$id]))

		{
            return $arr[$id];
        }
        return null;
    }
	
