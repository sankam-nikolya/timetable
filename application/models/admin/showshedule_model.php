<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Showshedule_model extends CI_Model {

    public function get_pars($date)
    {
        $this->db->query("SET lc_time_names = 'ru_RU'");
        $query = $this->db->query("
        SELECT
groups.name AS gp,
DATE_FORMAT (shedule.date, '%W %d.%m.%Y') AS formated_date,
s1.name AS para1,
s2.name AS para2,
s3.name AS para3,
s4.name AS para4,
s5.name AS para5,
s6.name AS para6,
s7.name AS para7,
s8.name AS para8,
s9.name AS para9,
s10.name AS para10,
s11.name AS para11,
s12.name AS para12,
s13.name AS para13,
s14.name AS para14,
s15.name AS para15,
s16.name AS para16,
s17.name AS para17,
s18.name AS para18,
s19.name AS para19,
s20.name AS para20,
s21.name AS para21,

c1.num AS clr1,
c2.num AS clr2,
c3.num AS clr3,
c4.num AS clr4,
c5.num AS clr5,
c6.num AS clr6,
c7.num AS clr7,
h1.id AS hw1,
h2.id AS hw2,
h3.id AS hw3,
h4.id AS hw4,
h5.id AS hw5,
h6.id AS hw6,
h7.id AS hw7
FROM
shedule
LEFT JOIN subject AS s1 ON shedule.para1 = s1.id
LEFT JOIN subject AS s2 ON shedule.para2 = s2.id
LEFT JOIN subject AS s3 ON shedule.para3 = s3.id
LEFT JOIN subject AS s4 ON shedule.para4 = s4.id
LEFT JOIN subject AS s5 ON shedule.para5 = s5.id
LEFT JOIN subject AS s6 ON shedule.para6 = s6.id
LEFT JOIN subject AS s7 ON shedule.para7 = s7.id
LEFT JOIN subject AS s8 ON shedule.ppara1 = s8.id
LEFT JOIN subject AS s9 ON shedule.ppara2 = s9.id
LEFT JOIN subject AS s10 ON shedule.ppara3 = s10.id
LEFT JOIN subject AS s11 ON shedule.ppara4 = s11.id
LEFT JOIN subject AS s12 ON shedule.ppara5 = s12.id
LEFT JOIN subject AS s13 ON shedule.ppara6 = s13.id
LEFT JOIN subject AS s14 ON shedule.ppara7 = s14.id
LEFT JOIN subject AS s15 ON shedule.ppara8 = s15.id
LEFT JOIN subject AS s16 ON shedule.ppara9 = s16.id
LEFT JOIN subject AS s17 ON shedule.ppara10 = s17.id
LEFT JOIN subject AS s18 ON shedule.ppara11 = s18.id
LEFT JOIN subject AS s19 ON shedule.ppara12 = s19.id
LEFT JOIN subject AS s20 ON shedule.ppara13 = s20.id
LEFT JOIN subject AS s21 ON shedule.ppara14 = s21.id
LEFT JOIN classroom AS c1 ON shedule.cr1 = c1.id
LEFT JOIN classroom AS c2 ON shedule.cr2 = c2.id
LEFT JOIN classroom AS c3 ON shedule.cr3 = c3.id
LEFT JOIN classroom AS c4 ON shedule.cr4 = c4.id
LEFT JOIN classroom AS c5 ON shedule.cr5 = c5.id
LEFT JOIN classroom AS c6 ON shedule.cr6 = c6.id
LEFT JOIN classroom AS c7 ON shedule.cr7 = c7.id
LEFT JOIN groups ON shedule.group1 = groups.id
LEFT JOIN homework AS h1 ON shedule.hw1 = h1.id
LEFT JOIN homework AS h2 ON shedule.hw2 = h2.id
LEFT JOIN homework AS h3 ON shedule.hw3 = h3.id
LEFT JOIN homework AS h4 ON shedule.hw4 = h4.id
LEFT JOIN homework AS h5 ON shedule.hw5 = h5.id
LEFT JOIN homework AS h6 ON shedule.hw6 = h6.id
LEFT JOIN homework AS h7 ON shedule.hw7 = h7.id

WHERE date = '$date'
ORDER BY group1 ASC");
        return $query->result_array();
    }

    public function get_days($from, $to)
    {
        $query = $this->db->query("SELECT DISTINCT date FROM shedule WHERE date BETWEEN '". $from ."' AND '". $to ."'");
        return $query->result_array();
    }
}