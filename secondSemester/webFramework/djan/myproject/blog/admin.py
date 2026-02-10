from django.contrib import admin
from .models import Post, Publisher, Author, ebook

admin.site.register(Post)
admin.site.register(Publisher)
admin.site.register(Author)
admin.site.register(ebook)