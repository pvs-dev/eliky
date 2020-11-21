import requests
import pymysql
import env
import time

connection = pymysql.connect(host=env.database_connection['host'], user=env.database_connection['user'], password=env.database_connection['password'], db=env.database_connection['db'], charset=env.database_connection['charset'],
                             cursorclass=pymysql.cursors.DictCursor)
params = {'api_key': env.eliky_api_key}

def parse_locality():
    connection.cursor().execute('truncate locality;')

    api_endpoint = 'http://eliky.in.ua/api/locality'  # &page=".$step
    i = 1
    while True:
        params['page'] = i
        r = requests.get(url=api_endpoint, params=params)
        data = r.json()
        with connection.cursor() as cursor:
            for result in data['result']:
                try:
                    sql = "INSERT INTO `locality` (`external_id`, `title`, `type`, `district`, `region`) VALUES (%s, %s, %s, %s, %s)"
                    cursor.execute(sql, (result['id'], result['title'], result['type'], result['district'], result['region']['title']))
                except Exception as e:
                    print(result)
                    print(e)
        connection.commit()
        if i % 2 == 0:
            time.sleep(1)
        if data['page']['total'] == i:
            break
        i += 1
    return i


def parse_medicament():
    connection.cursor().execute('truncate medicament;')
    connection.commit()
    api_endpoint = 'http://eliky.in.ua/api/medicament'  # &page=".$step
    i = 1
    while True:
        params['page'] = i
        r = requests.get(url=api_endpoint, params=params)
        data = r.json()
        
        with connection.cursor() as cursor:
            for result in data['result']:
                try:
                    sql = "INSERT INTO `medicament` (`external_id`, `title`, `type`, `inn`, `atc`, `dosage`) VALUES (%s, %s, %s, %s, %s, %s)"
                    cursor.execute(sql, (result['id'], result['title'], result['type'], result['inn'], result['atc'], (result['dosage_forms'][0] if len(result['dosage_forms'])>0 else '')))
                except Exception as e:
                    print(result)
                    print(e)
        connection.commit()
        if i % 2 == 0:
            time.sleep(1)
        if data['page']['total'] == i:
            break
        i += 1
    return i


def parse_package():
    connection.cursor().execute('truncate package;')
    connection.commit()
    api_endpoint = 'http://eliky.in.ua/api/package'  # &page=".$step
    i = 1
    while True:
        params['page'] = i
        r = requests.get(url=api_endpoint, params=params)
        data = r.json()
        
        with connection.cursor() as cursor:
            for result in data['result']:
                try:
                    sql = "INSERT INTO `package` (`external_id`, `title`, `description`) VALUES (%s, %s, %s)"
                    cursor.execute(sql, (result['id'], result['title'], result['description']))
                except Exception as e:
                    print(result)
                    print(e)
        connection.commit()
        if i % 2 == 0:
            time.sleep(1)
        if data['page']['total'] == i:
            break
        i += 1
    return i


def parse_category():
    connection.cursor().execute('truncate category;')
    connection.commit()
    api_endpoint = 'http://eliky.in.ua/api/category'  # &page=".$step
    i = 1
    while True:
        params['page'] = i
        r = requests.get(url=api_endpoint, params=params)
        data = r.json()
        
        with connection.cursor() as cursor:
            for result in data['result']:
                try:
                    sql = "INSERT INTO `category` (`external_id`, `title`, `type`, `group`, `hospital_id`, `hospital_title`) VALUES (%s, %s, %s, %s, %s, %s)"
                    cursor.execute(sql, (result['id'], result['title'], result['type'], result['group'], (result['hospital']['id'] if len(result['hospital'])>0 else None), (result['hospital']['title'] if len(result['hospital'])>0 else None)))
                except Exception as e:
                    print(result)
                    print(e)
        connection.commit()
        if i % 2 == 0:
            time.sleep(1)
        if data['page']['total'] == i:
            break
        i += 1
    return i


def parse_hospital():
    connection.cursor().execute('truncate hospital;')
    connection.commit()
    api_endpoint = 'http://eliky.in.ua/api/hospital'  # &page=".$step
    i = 1
    while True:
        params['page'] = i
        r = requests.get(url=api_endpoint, params=params)
        data = r.json()
        with connection.cursor() as cursor:
            for result in data['result']:
                try:
                    sql = "INSERT INTO `hospital` (`external_id`, `title`, `phone`, `edrpou`, `region_id`, `region_title`, `locality_id`, `locality_title`, `locality_type`, `address`, `location_geo_lat`, `location_geo_lng`) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)"
                    cursor.execute(sql, (result['id'], result['title'], result['phone'], result['edrpou'], (result['region']['id'] if len(result['region'])>0 else None), (result['region']['title'] if len(result['region'])>0 else None), (result['locality']['id'] if len(result['locality'])>0 else None), (result['locality']['title'] if len(result['locality'])>0 else None), (result['locality']['type'] if len(result['locality'])>0 else None), result['address'], (result['location']['geo_lat'] if len(result['location'])>0 else None), (result['location']['geo_lng'] if len(result['location'])>0 else None)))
                except Exception as e:
                    print(result)
                    print(e)
        connection.commit()
        if i % 2 == 0:
            time.sleep(1)
        if data['page']['total'] == i:
            break
        i += 1
    return i


def parse_hospital_category(hospital_id):
    api_endpoint = 'http://eliky.in.ua/api/hospital-category/'+str(hospital_id)  # &page=".$step
    i = 1
    while True:
        params['page'] = i
        r = requests.get(url=api_endpoint, params=params)
        data = r.json()
        if 'error' in data:
            print(r.url)
            print(data)
            break
        with connection.cursor() as cursor:
            for result in data['result']:
                try:
                    sql = "INSERT INTO `hospital_category` (`external_id`, `hospital_id`, `income_category_id`, `income_category_title`, `distribution_category_id`, `distribution_category_title`) VALUES (%s, %s, %s, %s, %s, %s)"
                    cursor.execute(sql, (result['id'], hospital_id, (result['income_category']['id'] if len(result['income_category'])>0 else None), (result['income_category']['title'] if len(result['income_category'])>0 else None), (result['distribution_category']['id'] if len(result['distribution_category'])>0 else None), (result['distribution_category']['title'] if len(result['distribution_category'])>0 else None)))
                except Exception as e:
                    print(result)
                    print(e)
        connection.commit()
        if i % 2 == 0:
            time.sleep(1)
        if data['page']['total'] == i:
            break
        i += 1
    return i


def parse_availability(hospital_id):
    api_endpoint = 'http://eliky.in.ua/api/availability/'+str(hospital_id)  # &page=".$step
    i = 1
    while True:
        params['page'] = i
        r = requests.get(url=api_endpoint, params=params)
        data = r.json()
        if 'error' in data:
            print(r.url)
            print(data)
            break
        with connection.cursor() as cursor:
            for result in data['result']:
                try:
                    sql = "INSERT INTO `availability` (`external_id`, `hospital_id`, `title`, `type`, `dosage_form`, `custom_dosage_form`, `package_id`, `package_title`, `date`, `quantities_hospital_category_id`, `quantities_value`) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)"
                    cursor.execute(sql, ((result['medicament']['id'] if len(result['medicament'])>0 else None), hospital_id, (result['medicament']['title'] if len(result['medicament'])>0 else None), (result['medicament']['type'] if len(result['medicament'])>0 else None), result['dosage_form'], result['custom_dosage_form'], (result['package']['id'] if len(result['package'])>0 else None), (result['package']['title'] if len(result['package'])>0 else None), result['date'], (result['quantities'][0]['hospital_category_id'] if len(result['quantities'])>0 else None), (result['quantities'][0]['value'] if len(result['quantities'])>0 else None)))
                except Exception as e:
                    print(result)
                    print(e)
        connection.commit()
        if i % 2 == 0:
            time.sleep(1)
        if data['page']['total'] == i:
            break
        i += 1
    return i


def parse_hospital_categories():
    cursor = connection.cursor()
    connection.cursor().execute('truncate hospital_category;')
    cursor.execute('select external_id from hospital')
    hospitals = cursor.fetchall()
    for hospital in hospitals:
        parse_hospital_category(hospital['external_id'])


def parse_availabilities():
    cursor = connection.cursor()
    connection.cursor().execute('truncate availability;')
    cursor.execute('select external_id from hospital')
    hospitals = cursor.fetchall()
    for hospital in hospitals:
        parse_availability(hospital['external_id'])


print(parse_locality())
print(parse_medicament())
print(parse_package())
print(parse_category())
print(parse_hospital())
print(parse_hospital_categories())
print(parse_availabilities())
connection.close()
