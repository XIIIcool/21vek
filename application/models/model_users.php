<?php

class Model_Users extends Model
{
    
        public function count_row($table){
            $sql = "SELECT *"
                    . " FROM"
                        . " `".$table."`";
            
            $query = DB::prepare($sql)->execute();
            return $query->rowCount();
        } 
        
	public function get_list($limit = LIST_VIEW_PAGE_LIMIT,$page = 1,$offset =0)
	{	
            
            if($page>1){
                $offset = (LIST_VIEW_PAGE_LIMIT * $page) - LIST_VIEW_PAGE_LIMIT;
            }            
            
            $sql = "SELECT "
                    . "`users`.`id`, "
                    . "`users`.`surname`,"
                    . "`users`.`name`,"
                    . "`users`.`patronymic`,"
                    . "`users`.`birthday`,"
                    . "(DATEDIFF(CURRENT_DATE, STR_TO_DATE(`users`.`birthday`, '%Y-%m-%d'))/365) as age,"
                    . "`users`.`status`"
                        . "FROM "
                            . "`users` "
                                . "ORDER BY "
                                    . "`users`.`surname` ASC LIMIT ?,?";

            DB::setAttribute( PDO::ATTR_EMULATE_PREPARES, false );
            $query = DB::prepare($sql)->execute([$offset,$limit]);
            $query = $query->fetchAll(PDO::FETCH_OBJ);
 
            return $query;
	}
        
        public function findid($id){
            $sql = "SELECT *"
                    . "FROM `users` "
                    . "WHERE `users`.`id` = ?";
           
            DB::setAttribute( PDO::ATTR_EMULATE_PREPARES, false );
            $query = DB::prepare($sql)->execute([$id]);
            return $query->fetch(PDO::FETCH_OBJ);
        }
        
        public function delete($id){
            
            if($this->findid($id)){
               $sql = "DELETE "
                        . "FROM `users` "
                            . "WHERE `users`.`id` = ?";
            
                DB::setAttribute( PDO::ATTR_EMULATE_PREPARES, false );
                $query = DB::prepare($sql)->execute([$id]);
                
                if(!$this->findid($id)){
                    return true;
                } else{
                    return false;
                }
            } else {
                return false;
            }
   
        }
        
        public function update($data){
            $sql = "UPDATE `users` SET surname=:surname, name=:name, patronymic=:patronymic, birthday=:birthday, status=:status WHERE id=:id";
            DB::setAttribute( PDO::ATTR_EMULATE_PREPARES, false );

            return DB::prepare($sql)->execute($data) ? true : false;
        }
        
        public function create($data){
            $sql = "INSERT INTO `users` (`surname`,`name`,`patronymic`, `birthday`,`status`) VALUES (:surname,:name,:patronymic, :birthday, :status)";
            DB::setAttribute( PDO::ATTR_EMULATE_PREPARES, false );
           
            return DB::prepare($sql)->execute($data) ? true : false;
        }
}