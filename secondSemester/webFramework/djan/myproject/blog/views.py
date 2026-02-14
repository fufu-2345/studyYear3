from django.shortcuts import render
from django.http import HttpResponse
from django.views.generic import ListView
from .models import Author, ebook, Publisher

def authorPage(request):
    authors = Author.objects.all()
    return render(request, 'author.html', {'authors': authors})

class EbookPage(ListView):
    model = ebook
    template_name = 'ebook.html'
    context_object_name = 'ebooks'
    
def publisherPage(request):
    publishers = Publisher.objects.all()
    return render(request, 'publisher.html', {'publishers': publishers})

def blog(request):
    return HttpResponse("this is blog")

def index(request):
    return HttpResponse("this is index")