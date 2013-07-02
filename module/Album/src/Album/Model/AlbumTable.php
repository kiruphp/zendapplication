<?php
namespace Album\Model;
use Zend\Db\TableGateway\TableGateway;


class AlbumTable
{
	public $tableGateway;
	
	public function __construct(TableGateway  $tablegateway)
	{
		$this->tableGateway = $tablegateway;
	}
	
	public function fetchAll()
	{
	
		$resultSet = $this->tableGateway->select();
        return $resultSet;
	}
	
	public function getAlbum($id)
    {
        $id  = (int) $id;
        $rowset = $this->tableGateway->select(array('id' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }
	
	public function saveAlbum(Album $album)
    {
        $data = array(
            'name' => $album->name
        );

        $id = (int)$album->id;
        if ($id == 0) {
            $this->tableGateway->insert($data);
        } else {
            if ($this->getAlbum($id)) {
                $this->tableGateway->update($data, array('id' => $id));
            } else {
                throw new \Exception('Form id does not exist');
            }
        }
    }

    public function deleteAlbum($id)
    {
        $this->tableGateway->delete(array('id' => $id));
    }
	
	
}

?>