from django.shortcuts import render
from django.http import Http404
from django.http import HttpResponse
from django.template import RequestContext, loader
from video.models import Video

# Create your views here.
def index(request):
	latest_videos = Video.objects.order_by('date_connection')[:2]
	template = loader.get_template('video/index.html')
	context = RequestContext(request, {
		'latest_videos' : latest_videos,
	})
	# output = ', '.join([v.ip for v in latest_videos])
	return HttpResponse(template.render(context))

def chat(request, chat_id):
	if request.method == 'GET':
		return HttpResponse("You're looking at chat %s. Using a GEt method" % chat_id)
	elif request.method == 'POST':
		return HttpResponse("You're looking at chat %s. Using a Post Method" % chat_id)
    

def results(request, video_id):
	vid = Video.objects.get(pk=video_id)
	template = loader.get_template('video/results.html')
	context = RequestContext(request, {
		'video' : vid,
	})
	return HttpResponse(template.render(context))
    # latest_videos = Video.objects.get('date_connection')[:2]
	# template = loader.get_template('video/results.html')
	# context = RequestContext(request, {
	# 	'latest_videos' : latest_videos,
	# })
	# return HttpResponse(template.render(context))

def vote(request, question_id):
    return HttpResponse("You're voting on question %s." % question_id)
