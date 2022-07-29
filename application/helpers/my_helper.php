<?php

function dd($data) {
    if (is_array($data)) {
        print_r($data);
        die();
    }

    if (is_string($data)) {
        echo $data;
        die();
    }
}

function isAuthenticated() {
    $ci =& get_instance();
    return $ci->session->is_logged_in === TRUE;
}

function getAutoNumber($table, $column, $code) {
    $ci =& get_instance();
    $query = "SELECT MAX($column) AS maxcode FROM $table";
    $query = $ci->db->query($query);

    $result_code = "";
    if($query->num_rows() > 0) {
        $maxcode = $query->row()->maxcode;
        if($maxcode != '') {
            $maxcode = explode("-", $maxcode);
            $maxcode = end($maxcode);
            $maxcode = (int) $maxcode + 1;

            $addZero = "";
            if(strlen($maxcode) == 1) {
                $addZero = "000";
            } elseif (strlen($maxcode) == 2) {
                $addZero = "00";
            } elseif (strlen($maxcode) == 3) {
                $addZero = "0";
            }
            $result_code = $code . "-" . $addZero . $maxcode;
        } else {
            $result_code = $code . "-0001";
        }
    } else {
        $result_code = $code . "-0001";
    }
    return $result_code;
}

function getUser($index = null) {
    if (isset($_SESSION['user'])) {
        return $_SESSION['user']->$index;
    } else {
        return null;
    }
}

function getUserLevel($index = null) {
    $user_level_lists = [
        'ADMIN' => 'Administrator',
        'KAPRODI' => 'Kaprodi'];

    if($index !== null) {
        return $user_level_lists[$index];
    }

    return $user_level_lists;
}

function getUserTypeCode($code = null) {
    $userLevel = getUserLevel();
    $result = [];
    $codeIndex = 1;
    foreach ($userLevel as $key => $val) {
        $result[$codeIndex] = $key;
        if($code !== null && $code === $key) {
            return $codeIndex;
            break;
        }
        $codeIndex++;
    }

    return $result;
}

function toRupiah($str) {
    return number_format($str, 0, ',', '.');
}

function removeDots($str) {
    return str_replace(".", "", $str);
}

function getStatus($status, $type = 'status') {
    $badge = "";
    if($type == 'status') {
        if($status == 1) {
            $badge = "<span class='badge badge-success'>YES</span>";
        } else {
            $badge = "<span class='badge badge-danger'>NO</span>";
        }
    } elseif ($type == 'pelunasan') {
        if($status == 1) {
            $badge = "<span class='badge badge-success'>Lunas</span>";
        } else {
            $badge = "<span class='badge badge-warning'>Belum</span>";
        }
    }
    return "<h6>$badge</h6>";
}

function getData($tableName, $columns = '*') {
    $ci =& get_instance();
    $sql = "SELECT $columns FROM $tableName";
    return $ci->db->query($sql)->result();
}

function provideAccessTo($userCodeList, $redirect = true) {
    if($userCodeList === 'all') {
        return true;
    } else {
        //Get current authenticted user code by user type
        $currentUser = getUser('level'); //SUPER_ADMIN
        $currentUserCode = getUserTypeCode($currentUser); //1

        //Split $userCodeList by |
        $allowedUser = explode("|", $userCodeList);

        if(in_array($currentUserCode, $allowedUser)) {
            return true;
        } else {
            if ($redirect === true) {
                redirect('restrict-page');
            } else {
                return false;
            }
        }

    }
}

function showOnlyTo($userCodeList) {
    return provideAccessTo($userCodeList, false);
}

function showBreadCrumb() {
    $ci =& get_instance();
    $html = "<div class='section-header-breadcrumb'>";
    $totalSegments = $ci->uri->total_segments();
    $class = "breadcrumb-item ";
    $html .= "<div class='$class'><a href='".base_url('dashboard')."'>Dashboard</a></div>";
    for ($i = 1; $i <= $totalSegments; $i++) {
        $uri = $ci->uri->segment($i);
        $label = ucfirst(str_replace("-", " ", $uri));

        if($uri == 'edit' || $uri == 'update') {
            $uri .=  "/" . $ci->uri->segment($i-1) . "/"  . $ci->uri->segment($i+1);
        }

        if($uri == "create") {
            $label = "Tambah";
        }

        if ($i == $totalSegments) {
            $class .= " active";
            $html .= "<div class='$class'>$label</div>";
        } else {
            $html .= "<div class='$class'><a href='".base_url($uri)."'>".$label."</a></div>";
        }
    }

    $html .= "</div>";

    return $html;
}

function getStudyProgram($key = null) {
    $arrStudyProgram = [
        'TI' => 'Teknik Informatika',
        'SI' => 'Sistem Informasi',
        'DKV' => 'Desain Komunikasi Visual',
        'MB' => 'Manajemen Bisnis',
        'KA' => 'Komputerisasi Akuntansi'
    ];

    if ($key !== null && array_key_exists($key, $arrStudyProgram)) {
        return $arrStudyProgram[$key];
    }

    return $arrStudyProgram;
}