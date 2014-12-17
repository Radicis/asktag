import fixtures
import constants
from authomatic.providers import oauth1

conf = fixtures.get_configuration('bitbucket')


CONFIG = {
    'login_xpath': '//*[@id="email"]',
    'password_xpath': '//*[@id="pass"]',
    'consent_xpaths': [
        '//*[@id="platformDialogForm"]/div[2]/div/table/tbody/tr/td[2]/button[2]'
    ],
    'class_': oauth1.Bitbucket,
    'scope': oauth1.Bitbucket.user_info_scope,
    'user': {
        'id': conf.user_id,
        'email': conf.user_email,
        'username': conf.user_username_reverse,
        'name': conf.user_name,
        'first_name': conf.user_first_name,
        'last_name': conf.user_last_name,
        'nickname': None,
        'birth_date': None,
        'city': conf.user_city,
        'country': conf.user_country,
        'gender': conf.user_gender,
        'link': LINK,
        'locale': conf.user_locale,
        'phone': None,
        'picture': PICTURE,
        'postal_code': None,
        'timezone': conf.user_timezone,
    },
    'content_should_contain': [
        conf.user_id,
        conf.user_username_reverse,
        conf.user_name, conf.user_first_name, conf.user_last_name,
        conf.user_city, conf.user_country,
        conf.user_gender,
        LINK.replace('/', '\/'),
        conf.user_locale,
        conf.user_timezone,

        # User info JSON keys
    ],
    # Case insensitive
    'content_should_not_contain': conf.no_phone + conf.no_birth_date,
    # True means that any thruthy value is expected
    'credentials': {
        'token_type': None,
        'provider_type_id': '2-5',
        '_expiration_time': True,
        'consumer_key': None,
        'provider_id': None,
        'consumer_secret': None,
        'token': True,
        'token_secret': None,
        '_expire_in': True,
        'provider_name': 'facebook',
        'refresh_token': None,
        'provider_type': 'authomatic.providers.oauth2.OAuth2',
        'refresh_status': constants.CREDENTIALS_REFRESH_OK,
    },
    # Testing changes after credentials refresh
    # same: True
    # not same: False
    # don't test: None
    'credentials_refresh_change': {
        'token_type': True,
        'provider_type_id': True,
        '_expiration_time': None,
        'consumer_key': True,
        'provider_id': True,
        'consumer_secret': True,
        'token': False,
        'token_secret': True,
        '_expire_in': None,
        'provider_name': True,
        'refresh_token': True,
        'provider_type': True,
    },
}