<?php

/* @var $this yii\web\View */

$this->title = 'liky api';
?>
<div class="site-index">

    <div class="body-content">

        <div class="row">

            <div class="col-lg-12">
                <a href="/email/index">/email</a> - <i>Список отправленных сообщений</i>
            </div>
            <div class="col-lg-12">
                <a href="/mail-hospital">/mail-hospital</a> - <i>Добавление больницы для отправки email</i>
            </div>
            <div class="col-lg-12">
                <h2>Api docs</h2>
            </div>
            <div class="col-lg-12">
                <b>Get:</b> <a href="/api/locality?region=Луганська область&page=1&limit=100">/api/locality?region=Луганська область&page=1&limit=100</a> - <i>Отримання даних про населені пункти</i>
            </div>
            <div class="col-lg-12">
                <b>Get:</b> <a href="/api/medicament?page=1&limit=100">/api/medicament?page=1&limit=100</a> - <i>Отримання даних про ЛЗ та ВМП</i>
            </div>
            <div class="col-lg-12">
                <b>Get:</b> <a href="/api/regions">/api//api/regions</a> - <i>Список областей</i>
            </div>
            <div class="col-lg-12">
                <b>Get:</b> <a href="/api/package">/api/package</a> - <i>Отримання даних про одиниці виміру</i>
            </div>
            <div class="col-lg-12">
                <b>Get:</b> <a href="/api/hospital?locality_id=300&region=Луганська область&page=1&limit=100">/api/hospital?locality_id=300&amp;region=Луганська область&page=1&limit=100</a> - <i>Отримання даних про лікарні</i>
            </div>
            <div class="col-lg-12">
                <b>Get:</b> <a href="/api/hospital-category?hospital_id=43&page=1&limit=100">/api/hospital-category?hospital_id=43&page=1&limit=100</a> - <i>Отримання даних про категорії лікарні</i>
            </div>
            <div class="col-lg-12">
                <b>Get:</b> <a href="/api/availability?hospital_id=43&page=1&limit=100">/api/availability?hospital_id=43&page=1&limit=100</a> - <i>Отримання даних про наявність ЛЗ та
                    ВМП у лікарні</i>
            </div>
            <div class="col-lg-12">
                <b>Get:</b> <a href="/api/mail-hospitals">/api/mail-hospitals</a> - <i>Список больниц для Email</i>
            </div>
            <div class="col-lg-12">
                <b>Post:</b> <a href="/api/send-mail">/api/send-mail</a> - <i>Отправка Email в больницу</i>
                <div class="api_about">
                    {<br>
                    &emsp;'email':'frommail@gmail.com',<br>
                    &emsp;'hospital': '4',<br>
                    &emsp;'text':'тестовое сообщение',<br>
                    &emsp;'phone':'+380991122333',<br>
                    &emsp;'fio':'Василий Пупкин'<br>
                    }<br><br>

                    Ответ: {"data":[],"status":"success","message":""}
                </div>
            </div>
            <div class="col-lg-12">
                <b>Post:</b> <a href="/api/rating">/api/rating</a> - <i>Отправка рейтинга</i>
                <div class="api_about">
                    {<br>
                    &emsp;'email_hospital_id':'5',<br>
                    &emsp;'rating':'5', (deprecated)<br>
                    &emsp;'level':'5',<br>
                    &emsp;'condition':'5',<br>
                    &emsp;'availability':'5',<br>
                    &emsp;'attitude':'5',<br>
                    &emsp;'name':'Василий',<br>
                    &emsp;'comment':'this is my favorite hospital',<br>
                    &emsp;'device_id':'any$ym0LS'<br>
                    }<br><br>

                    Ответ: {"data":[],"status":"success","message":""}
                </div>
            </div>
            <div class="col-lg-12">
                <b>Get:</b> <a href="/api/rating-list?email_hospital_id=5">/api/mail-hospitals?email_hospital_id=5</a> - <i>рейтинги по больнице</i>
            </div>
        </div>

    </div>
</div>
