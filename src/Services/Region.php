<?php
namespace Jan\Services;


/**
 * Class Region
 * @package Jan\Services
*/
class Region
{
    /**
     * @return array
    */
    public static function stuff()
    {
        return [
            "Алтайский край",
            "Амурская область",
            "Архангельская область",
            "Астраханская область",
            "Белгородская область",
            "Брянская область",
            "Владимирская область",
            "Волгоградская область",
            "Вологодская область",
            "Воронежская область",
            "г. Москва",
            "г. Санкт-Петербург",
            "г. Севастополь",
            "Еврейская автономная область",
            "Забайкальский край",
            "Ивановская область",
            "Иркутская область",
            "Кабардино-Балкарская Республика",
            "Калининградская область",
            "Калужская область",
            "Камчатский край",
            "Карачаево-Черкесская Республика",
            "Кемеровская область",
            "Кировская область",
            "Костромская область",
            "Краснодарский край",
            "Красноярский край",
            "Курганская область",
            "Курская область",
            "Ленинградская область",
            "Липецкая область",
            "Магаданская область",
            "Московская область",
            "Мурманская область",
            "Ненецкий автономный округ",
            "Нижегородская область",
            "Новгородская область",
            "Новосибирская область",
            "Омская область",
            "Оренбургская область",
            "Орловская область",
            "Пензенская область",
            "Пермский край",
            "Приморский край",
            "Псковская область",
            "Республика Адыгея",
            "Республика Алтай",
            "Республика Башкортостан",
            "Республика Бурятия",
            "Республика Дагестан",
            "Республика Ингушетия",
            "Республика Калмыкия",
            "Республика Карелия",
            "Республика Коми",
            "Республика Крым",
            "Республика Марий Эл",
            "Республика Мордовия",
            "Республика Саха (Якутия)",
            "Республика Северная Осетия — Алания",
            "Республика Татарстан",
            "Республика Тыва",
            "Республика Хакасия",
            "Ростовская область",
            "Рязанская область",
            "Самарская область",
            "Саратовская область",
            "Сахалинская область",
            "Свердловская область",
            "Смоленская область",
            "Ставропольский край",
            "Тамбовская область",
            "Тверская область",
            "Томская область",
            "Тульская область",
            "Тюменская область",
            "Удмуртская Республика",
            "Ульяновская область",
            "Хабаровский край",
            "Ханты-Мансийский автономный округ - Югра",
            "Челябинская область",
            "Чеченская Республика",
            "Чувашская Республика",
            "Чукотский автономный округ",
            "Ямало-Ненецкий автономный округ",
            "Ярославская область"
        ];
    }


    /**
     * @return string[]
    */
    /*
    public static function repositories()
    {
        return [
            "Алтайский край\n",
            "Амурская область\n",
            "Архангельская область\n",
            "Астраханская область\n",
            "Белгородская область\n",
            "Брянская область\n",
            "Владимирская область\n",
            "Волгоградская область\n",
            "Вологодская область\n",
            "Воронежская область\n",
            "г. Москва\n",
            "г. Санкт-Петербург\n",
            "г. Севастополь\n",
            "Еврейская автономная область\n",
            "Забайкальский край\n",
            "Ивановская область\n",
            "Иркутская область\n",
            "Кабардино-Балкарская Республика\n",
            "Калининградская область\n",
            "Калужская область\n",
            "Камчатский край\n",
            "Карачаево-Черкесская Республика\n",
            "Кемеровская область\n",
            "Кировская область\n",
            "Костромская область\n",
            "Краснодарский край\n",
            "Красноярский край\n",
            "Курганская область\n",
            "Курская область\n",
            "Ленинградская область\n",
            "Липецкая область\n",
            "Магаданская область\n",
            "Московская область\n",
            "Мурманская область\n",
            "Ненецкий автономный округ\n",
            "Нижегородская область\n",
            "Новгородская область\n",
            "Новосибирская область\n",
            "Омская область\n",
            "Оренбургская область\n",
            "Орловская область\n",
            "Пензенская область\n",
            "Пермский край\n",
            "Приморский край\n",
            "Псковская область\n",
            "Республика Адыгея\n",
            "Республика Алтай\n",
            "Республика Башкортостан\n",
            "Республика Бурятия\n",
            "Республика Дагестан\n",
            "Республика Ингушетия\n",
            "Республика Калмыкия\n",
            "Республика Карелия\n",
            "Республика Коми\n",
            "Республика Крым\n",
            "Республика Марий Эл\n",
            "Республика Мордовия\n",
            "Республика Саха (Якутия)\n",
            "Республика Северная Осетия — Алания\n",
            "Республика Татарстан\n",
            "Республика Тыва\n",
            "Республика Хакасия\n",
            "Ростовская область\n",
            "Рязанская область\n",
            "Самарская область\n",
            "Саратовская область\n",
            "Сахалинская область\n",
            "Свердловская область\n",
            "Смоленская область\n",
            "Ставропольский край\n",
            "Тамбовская область\n",
            "Тверская область\n",
            "Томская область\n",
            "Тульская область\n",
            "Тюменская область\n",
            "Удмуртская Республика\n",
            "Ульяновская область\n",
            "Хабаровский край\n",
            "Ханты-Мансийский автономный округ - Югра\n",
            "Челябинская область\n",
            "Чеченская Республика\n",
            "Чувашская Республика\n",
            "Чукотский автономный округ\n",
            "Ямало-Ненецкий автономный округ\n",
            "Ярославская область\n"
        ];
    }
    */
}