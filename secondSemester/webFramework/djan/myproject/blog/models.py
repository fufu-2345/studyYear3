from django.db import models

class Post(models.Model):
    title = models.CharField(max_length=200)
    content = models.TextField()
    created_at = models.DateTimeField(auto_now_add=True)
    def __str__(self):
        return self.title
    
class Publisher(models.Model):
    Publisher = models.CharField(max_length=200)
    Business_info = models.TextField(null=True)
    address = models.CharField(max_length=200)
    phone = models.TextField()
    def __str__(self):
        return self.Publisher
    
class Author(models.Model):
    pen_name = models.CharField(max_length=200, unique=True)
    bio = models.TextField(null=True)
    photo = models.ImageField(null=True)
    email = models.EmailField(null=True)
    member_date = models.DateField(null=True,auto_now_add=True)
    publisher = models.ManyToManyField('Publisher',null=True)
    def __str__(self):
        return self.pen_name
    
class ebook(models.Model):
    title = models.CharField()
    description = models.TextField(null=True)
    cover_image = models.ImageField(null=True)
    price = models.DecimalField(default=0.00, max_digits=6, decimal_places=2)
    publisher_date = models.DateField(auto_now_add=True, null=True)
    status = models.CharField(max_length=200, default='no')
    page_count = models.IntegerField(null=True)
    authors = models.ForeignKey(Author, on_delete=models.CASCADE, null=True)
    def __str__(self):
        return self.title
    
    @classmethod
    def getName(cls, name):
        books = cls.objects.filter(authors__pen_name=name)
        return [b.title for b in books]