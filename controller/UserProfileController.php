
<?php
require_once '../../controller/DBcontroller.php';
class UserProfileController {
    private $db;

    public function __construct() {
        $this->db = new DBController;
    }

    public function displayPurchasedCourses($userId) {
        $this->db->openConnection();

        // Retrieve purchased courses for the user
        $query = "SELECT purchased_courses.course_id, course.name
        FROM purchased_courses
        INNER JOIN course ON purchased_courses.course_id = course.id
        WHERE purchased_courses.user_id = $userId;
         ";
            $result =  $this->db->select($query);;

            if (is_array($result)) {
                // Use count for arrays
                $rowCount = count($result);
            } else {
                // Use num_rows for mysqli_result
                $rowCount = $result->num_rows;
            }
    
            // Display the purchased courses
            if ($rowCount > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='d-flex align-items-center text-decoration-none mb-4'>";
                    echo "<a href='Course vedio.php'>";
                    echo "<img class='img-fluid rounded' src='img/courses-80x80.jpg' alt=''>";
                    echo "<div class='pl-3'>";
                    echo "<h6>{$row['course_name']}</h6>";
                    echo "</div>";
                    echo "</a>";
                    echo "<form method='POST' action='Profile.php'>";
                    echo "<button type='submit' class='btn btn-primary btn-user btn-block' name='delete_course' value='{$row['course_id']}'><i class='fa fa-trash'></i></button>";
                    echo "</form>";
                    echo "</div>";
                }
            
            
                echo "</ul>";
            } else {
                echo "<p>No purchased courses found.</p>";
            }



        $this->db->closeConnection();
    }
}

// Example usage:

