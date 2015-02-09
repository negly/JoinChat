from django.conf.urls import patterns, url

from chat import views
from chat import server

urlpatterns = patterns('',
    url(r'^$', server, name='main'),
    # url(r'^(?P<chat_id>\d+)/$', views.chat, name='chat'),
    # url(r'^(?P<video_id>\d+)/results/$', views.results, name='results'),
    # url(r'^(?P<question_id>\d+)/vote/$', views.vote, name='vote'),
)