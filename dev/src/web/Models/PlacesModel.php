<?php


class PlacesModel extends Model
{

    public function init()
    {
        $this->setParam("title", "Warto zobaczyć");
        $this->setParam("data", "<ul>
            <li>Stonehenge (Wielka Brytania)</li>
            <li>Wersal (Francja)</li>
            <li>Koloseum (Włochy)</li>
            <li>Parteon (Grecja)</li>
            <li>Big Ben (Wielka Brytania)</li>
            <li>Most Karola (Czechy)</li>
            <li>Brama Brandenburska (Niemcy)</li>
            <li>Wieża Eiffla (Francja)</li>
          </ul>");

    }
}