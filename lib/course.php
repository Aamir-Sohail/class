<?php
class Course {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    // Get all courses
    public function getAllcourses() {
        $this->db->query("
            SELECT courses.*, CourseID AS cID
            FROM courses
            INNER JOIN assigment
            ON courses.CourseID = cID
            ORDER BY post_date DESC
        ");

        // Assign result set
        $results = $this->db->resultSet();

        return $results;
    }

    // Get Assigment
    public function getAssigment() {
        $this->db->query("
            SELECT * FROM assigment
        ");

        // Assign result set
        $results = $this->db->resultSet();

        return $results;
    }

    // Get assigment by courses
    public function getBycourses($Course) {
        $this->db->query("
            SELECT assigment.*, CourseID AS c.ID
            FROM assigment
            INNER JOIN courses
            ON courses.CourseID = cID
            WHERE courses.CourseID = $Course
            ORDER BY post_date DESC
        ");

        // Assign result set
        $results = $this->db->resultSet();

        return $results;
    }

    // Get Assigment
    public function getcourses($CourseID) {
        $this->db->query("
            SELECT *
            FROM courses
            WHERE id = :cID
        ");

        $this->db->bind(':cID', $CourseID);

        // Assign row
        $row = $this->db->single();

        return $row;
    }

    // Get Course
    public function getcourse($id) {
        $this->db->query("
            SELECT *
            FROM courses
            WHERE id = :id
        ");

        $this->db->bind(':id', $id);

        // Assign row
        $row = $this->db->single();

        return $row;
    }

    // Create Assigment
    public function create($data) {
        // Insert query
        $this->db->query("
        INSERT INTO courses (CourseID,CourseName) VALUES(:CourseID,:CourseName)");


        // Bind data
        $this->db->bind(':CourseID', $data['CourseID']);
        $this->db->bind(':CourseName', $data['CourseName']);
      
        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Delete Assigment
    public function delete($id) {
        // Insert query
        $this->db->query("
            DELETE FROM assigment
            WHERE id = $id
        ");

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Update Assigment
    public function update($id, $data) {
        // Insert query
        $this->db->query("
            UPDATE assigment
            SET
                CourseID= :CourseID,
                CourseName = :CourseName
                
            WHERE id = $id
        ");

        // Bind data
        $this->db->bind(':CourseID', $data['CourseID']);
        $this->db->bind(':CourseName', $data['CourseName']);
        

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
