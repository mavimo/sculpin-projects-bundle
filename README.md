# Sculpin Projects Bundle

## Setup

Add this bundle in your ```sculpin.json``` file:

```json
{
    // ...
    "require": {
        // ...
        "mavimo/sculpin-projects-bundle": "@dev"
    }
}
```

and install this bundle running ```sculpin update```.

Now you can register the bundle in ```SculpinKernel``` class available on ```app/SculpinKernel.php``` file:

```php
class SculpinKernel extends \Sculpin\Bundle\SculpinBundle\HttpKernel\AbstractKernel
{
    protected function getAdditionalSculpinBundles()
    {
        return array(
           'Mavimo\Sculpin\Bundle\ProjectsBundle\SculpinProjectsBundle'
        );
    }
}
```

## How to use

In your sources create a subfolder *_projects* and add some file inside it, like:

```
my-blog/
└── source
    ├── // ...
    └── _projects
        ├── 2014-01-01-my-new-project.md
        ├── 2014-01-02-another-project.md
        └── 2014-01-03-more-projects.md
```
create the required template files, and get the list of projects using in document metadata to have the paginated list of projects:
```
---
title: Projects
// ...
generator: pagination
pagination:
    provider: data.projects
// ...
---
```
