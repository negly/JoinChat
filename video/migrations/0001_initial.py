# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.db import models, migrations


class Migration(migrations.Migration):

    dependencies = [
    ]

    operations = [
        migrations.CreateModel(
            name='Video',
            fields=[
                ('id', models.AutoField(serialize=False, verbose_name='ID', primary_key=True, auto_created=True)),
                ('ip', models.CharField(max_length=200)),
                ('user', models.CharField(max_length=100)),
                ('date_connection', models.DateTimeField(verbose_name='Date of connection')),
            ],
            options={
            },
            bases=(models.Model,),
        ),
    ]
