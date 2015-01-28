from django.conf.urls import patterns, url

from video import views

urlpatterns = patterns('',
    url(r'^$', views.index, name='index'),
    url(r'^(?P<chat_id>\d+)/$', views.chat, name='chat'),
    url(r'^(?P<question_id>\d+)/results/$', views.results, name='results'),
    url(r'^(?P<question_id>\d+)/vote/$', views.vote, name='vote'),
)