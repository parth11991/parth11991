
// 1
$this->db->delete('_conf_node_type_xrefs', array('node_id' => 1));

//2
$cluster = array(
  'name' => 'Default',
  'reference' => 'default'
);
$this->db->where('id', 2);
$this->db->update('_conf_cluster', $cluster);

// 3
$query = $this->db->select("tx.id, tx.type_id, t.name, tx.source_node_ids, tx.grouping")
->from('_conf_type_xrefs tx')
->join('_conf_type t', 't.id = tx.source_type_id', 'left')
->where('tx.type_id', $type_id)
->order_by('cast(tx.grouping AS UNSIGNED) ASC,tx.rank DESC');

//4
$type = array(
    'name'=>'Test',
    'table'=>'test'
);
$this->db->insert('_conf_type',$type);
