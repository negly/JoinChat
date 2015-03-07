#!/usr/bin/env python
# -*- coding: utf-8 -*-
# The MIT License (MIT)

# Copyright (c) 2015 

# John Congote <jcongote@gmail.com>
# Felipe Calad
# Isabel Lozano
# Juan Diego Perez
# Joinner Ovalle

# Permission is hereby granted, free of charge, to any person obtaining a copy
# of this software and associated documentation files (the "Software"), to deal
# in the Software without restriction, including without limitation the rights
# to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
# copies of the Software, and to permit persons to whom the Software is
# furnished to do so, subject to the following conditions:

# The above copyright notice and this permission notice shall be included in
# all copies or substantial portions of the Software.

# THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
# IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
# FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
# AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
# LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
# OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
# THE SOFTWARE.

import logging
import os
import uuid

from tornado.ioloop import IOLoop
from tornado.web import Application, RequestHandler
from tornado.websocket import WebSocketHandler


rel = lambda *x: os.path.abspath(os.path.join(os.path.dirname(__file__), *x))

global_rooms = {}


class Room(object):
    def __init__(self, name, clients=[]):
        self.name = name
        self.clients = clients

    def __repr__(self):
        return self.name


class MainHandler(RequestHandler):
    def get(self):
        room = str(uuid.uuid4())
        self. redirect('/room/'+room)


class RoomHandler(RequestHandler):
    def get(self, slug):
        self.render('room.html')


class EchoWebSocket(WebSocketHandler):
    def open(self, slug):
        if slug in global_rooms:
            global_rooms[slug].clients.append(self)
        else:
            global_rooms[slug] = Room(slug, [self])
        self.room = global_rooms[slug]
        if len(self.room.clients) > 2:
            self.write_message('fullhouse')
        elif len(self.room.clients) == 1:
            self.write_message('initiator')
        else:
            self.write_message('not initiator')
        logging.info(
            'WebSocket connection opened from %s', self.request.remote_ip)

    def on_message(self, message):
        logging.info(
            'Received message from %s: %s', self.request.remote_ip, message)
        for client in self.room.clients:
            if client is self:
                continue
            client.write_message(message)

    def on_close(self):
        logging.info('WebSocket connection closed.')
        self.room.clients.remove(self)


def main():
    settings = dict(
        template_path=rel('templates'),
        static_path=rel('static'),
        debug=True
    )

    application = Application([
        (r'/', MainHandler),
        (r"/room/([^/]*)", RoomHandler),
        (r'/ws/([^/]*)', EchoWebSocket),
    ], **settings)

    application.listen(port=9876, address='')
    logging.info("Started listening at localhost:9876.")
    IOLoop.instance().start()


if __name__ == '__main__':
    main()
