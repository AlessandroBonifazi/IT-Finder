<?php

use Illuminate\Database\Seeder;
use App\Technology;

class TechnologyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $technologies = [
            [
                "name" => "Ableton Live",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Ableton-Light.svg",
            ],
            [
                "name" => "Activity Pub",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/ActivityPub-Light.svg",
            ],
            [
                "name" => "Actix",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Actix-Light.svg",
            ],
            [
                "name" => "Adobe After Effects",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/AfterEffects.svg",
            ],
            [
                "name" => "AiScript",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/AiScript-Light.svg",
            ],
            [
                "name" => "AlpineJs",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/AlpineJS-Light.svg",
            ],
            [
                "name" => "Android Studio",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/AndroidStudio-Light.svg",
            ],
            [
                "name" => "Angular",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Angular-Light.svg",
            ],
            [
                "name" => "Ansible",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Ansible.svg",
            ],
            [
                "name" => "Apollo",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Apollo.svg",
            ],
            [
                "name" => "Appwrite",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Appwrite.svg",
            ],
            [
                "name" => "Arduino",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Arduino.svg",
            ],
            [
                "name" => "Astro",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Astro.svg",
            ],
            [
                "name" => "Atom",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Atom.svg",
            ],
            [
                "name" => "Audition",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Audition.svg",
            ],
            [
                "name" => "Autocad",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/AutoCAD-Light.svg",
            ],
            [
                "name" => "Amazon Web Services",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/AWS-Light.svg",
            ],
            [
                "name" => "Azul",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Azul.svg",
            ],
            [
                "name" => "Azure",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Azure-Light.svg",
            ],
            [
                "name" => "Bash",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Bash-Light.svg",
            ],
            [
                "name" => "Bevy",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Bevy-Light.svg",
            ],
            [
                "name" => "Blender",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Blender-Light.svg",
            ],
            [
                "name" => "Bootstrap",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Bootstrap.svg",
            ],
            [
                "name" => "Bsd",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/BSD-Light.svg",
            ],
            [
                "name" => "C",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/C.svg",
            ],
            [
                "name" => "C#",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/CS.svg",
            ],
            [
                "name" => "C++",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/CPP.svg",
            ],
            [
                "name" => "Cassandra",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Cassandra-Light.svg",
            ],
            [
                "name" => "Clojure",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Clojure-Light.svg",
            ],
            [
                "name" => "Cloudflare",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Cloudflare-Light.svg",
            ],
            [
                "name" => "CoffeeScript",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/CoffeeScript-Light.svg",
            ],
            [
                "name" => "CSS",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/CSS.svg",
            ],
            [
                "name" => "Dart",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Dart-Light.svg",
            ],
            [
                "name" => "DENO",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/DENO-Light.svg",
            ],
            [
                "name" => "Django",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Django.svg",
            ],
            [
                "name" => "Docker",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Docker.svg",
            ],
            [
                "name" => ".NET",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/DotNet.svg",
            ],
            [
                "name" => "DynamoDB",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/DynamoDB-Light.svg",
            ],
            [
                "name" => "Eclipse",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Eclipse-Light.svg",
            ],
            [
                "name" => "Electron",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Electron.svg",
            ],
            [
                "name" => "Elixir",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Elixir-Light.svg",
            ],
            [
                "name" => "Emacs",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Emacs.svg",
            ],
            [
                "name" => "Ember",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Ember.svg",
            ],
            [
                "name" => "Emotion",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Emotion-Light.svg",
            ],
            [
                "name" => "ExpressJS",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/ExpressJS-Light.svg",
            ],
            [
                "name" => "FastAPI",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/FastAPI.svg",
            ],
            [
                "name" => "Fediverse",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Fediverse-Light.svg",
            ],
            [
                "name" => "Figma",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Figma-Light.svg",
            ],
            [
                "name" => "Firebase",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Firebase-Light.svg",
            ],
            [
                "name" => "Flask",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Flask-Light.svg",
            ],
            [
                "name" => "Flutter",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Flutter-Light.svg",
            ],
            [
                "name" => "Forth",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Forth.svg",
            ],
            [
                "name" => "Fortran",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Fortran.svg",
            ],
            [
                "name" => "GameMaker",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/GameMakerStudio.svg",
            ],
            [
                "name" => "Gatsby",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Gatsby.svg",
            ],
            [
                "name" => "Google Cloud Platform",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/GCP-Light.svg",
            ],
            [
                "name" => "GIT",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Git.svg",
            ],
            [
                "name" => "Github",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Github-Light.svg",
            ],
            [
                "name" => "Gitlab",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/GitLab-Light.svg",
            ],
            [
                "name" => "Gherkin",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Gherkin-Light.svg",
            ],
            [
                "name" => "GoLang",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/GoLang.svg",
            ],
            [
                "name" => "Gradle",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Gradle-Light.svg",
            ],
            [
                "name" => "Godot",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Godot-Light.svg",
            ],
            [
                "name" => "Grafana",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Grafana-Light.svg",
            ],
            [
                "name" => "GraphQL",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/GraphQL-Light.svg",
            ],
            [
                "name" => "GTK",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/GTK-Light.svg",
            ],
            [
                "name" => "Haskell",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Haskell-Light.svg",
            ],
            [
                "name" => "Haxe",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Haxe-Light.svg",
            ],
            [
                "name" => "HaxeFlixel",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/HaxeFlixel-Light.svg",
            ],
            [
                "name" => "Heroku",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Heroku.svg",
            ],
            [
                "name" => "Hibernate",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Hibernate-Light.svg",
            ],
            [
                "name" => "HTML",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/HTML.svg",
            ],
            [
                "name" => "Idea",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Idea-Light.svg",
            ],
            [
                "name" => "Illustrator",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Illustrator.svg",
            ],
            [
                "name" => "Java",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Java-Light.svg",
            ],
            [
                "name" => "JavaScript",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/JavaScript.svg",
            ],
            [
                "name" => "Jenkins",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Jenkins-Light.svg",
            ],
            [
                "name" => "Jest",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Jest.svg",
            ],
            [
                "name" => "JQuery",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/JQuery.svg",
            ],
            [
                "name" => "Julia",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Julia-Light.svg",
            ],
            [
                "name" => "Kotlin",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Kotlin-Light.svg",
            ],
            [
                "name" => "Ktor",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Ktor-Light.svg",
            ],
            [
                "name" => "Kubernetes",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Kubernetes.svg",
            ],
            [
                "name" => "Laravel",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Laravel-Light.svg",
            ],
            [
                "name" => "Latex",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/LaTeX-Light.svg",
            ],
            [
                "name" => "Linkedin",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/LinkedIn.svg",
            ],
            [
                "name" => "Linux",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Linux-Light.svg",
            ],
            [
                "name" => "Lua",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Lua-Light.svg",
            ],
            [
                "name" => "MD",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Markdown-Light.svg",
            ],
            [
                "name" => "Mastodon",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Mastodon-Light.svg",
            ],
            [
                "name" => "MaterialUI",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/MaterialUI-Light.svg",
            ],
            [
                "name" => "Maven",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Maven-Light.svg",
            ],
            [
                "name" => "Misskey",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Misskey-Light.svg",
            ],
            [
                "name" => "MongoDB",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/MongoDB.svg",
            ],
            [
                "name" => "MySQL",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/MySQL-Light.svg",
            ],
            [
                "name" => "NeoVim",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/NeoVim-Light.svg",
            ],
            [
                "name" => "NestJS",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/NestJS-Light.svg",
            ],
            [
                "name" => "Netlify",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Netlify-Light.svg",
            ],
            [
                "name" => "NextJS",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/NextJS-Light.svg",
            ],
            [
                "name" => "Nginx",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Nginx.svg",
            ],
            [
                "name" => "Nim",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Nim-Light.svg",
            ],
            [
                "name" => "NodeJS",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/NodeJS-Light.svg",
            ],
            [
                "name" => "NuxtJS",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/NuxtJS-Light.svg",
            ],
            [
                "name" => "OCaml",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/OCaml.svg",
            ],
            [
                "name" => "Octave",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Octave-Light.svg",
            ],
            [
                "name" => "OpenShift",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/OpenShift.svg",
            ],
            [
                "name" => "OpenStack",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/OpenStack-Light.svg",
            ],
            [
                "name" => "OCaml",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/OCaml.svg",
            ],
            [
                "name" => "Octave",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Octave-Light.svg",
            ],
            [
                "name" => "OpenShift",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/OpenShift.svg",
            ],
            [
                "name" => "OpenStack",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/OpenStack-Light.svg",
            ],
            [
                "name" => "Perl",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Perl.svg",
            ],
            [
                "name" => "Photoshop",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Photoshop.svg",
            ],
            [
                "name" => "PHP",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/PHP-Light.svg",
            ],
            [
                "name" => "Plan9",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Plan9-Light.svg",
            ],
            [
                "name" => "PostgreSQL",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/PostgreSQL-Light.svg",
            ],
            [
                "name" => "PowerShell",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Powershell-Light.svg",
            ],
            [
                "name" => "Premiere",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Premiere.svg",
            ],
            [
                "name" => "Prisma",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Prisma.svg",
            ],
            [
                "name" => "Prometheus",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Prometheus.svg",
            ],
            [
                "name" => "Pug",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Pug-Light.svg",
            ],
            [
                "name" => "Python",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Python-Light.svg",
            ],
            [
                "name" => "PyTorch",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/PyTorch-Light.svg",
            ],
            [
                "name" => "QT",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/QT-Light.svg",
            ],
            [
                "name" => "R",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/R-Light.svg",
            ],
            [
                "name" => "Rails",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Rails.svg",
            ],
            [
                "name" => "Raspberry Pi",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/RaspberryPi-Light.svg",
            ],
            [
                "name" => "React",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/React-Light.svg",
            ],
            [
                "name" => "ReactiveX",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/ReactiveX-Light.svg",
            ],
            [
                "name" => "Redis",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Redis-Light.svg",
            ],
            [
                "name" => "Redux",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Redux.svg",
            ],
            [
                "name" => "Regex",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Regex-Light.svg",
            ],
            [
                "name" => "Remix",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Remix-Light.svg",
            ],
            [
                "name" => "Rocket",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Rocket.svg",
            ],
            [
                "name" => "RollupJS",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/RollupJS-Light.svg",
            ],
            [
                "name" => "ROS",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/ROS-Light.svg",
            ],
            [
                "name" => "Ruby",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Ruby.svg",
            ],
            [
                "name" => "Rust",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Rust.svg",
            ],
            [
                "name" => "Sass",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Sass.svg",
            ],
            [
                "name" => "Solidity",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Solidity.svg",
            ],
            [
                "name" => "Spring",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Spring-Light.svg",
            ],
            [
                "name" => "SQLite",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/SQLite.svg",
            ],
            [
                "name" => "StackOverflow",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/StackOverflow-Light.svg",
            ],
            [
                "name" => "Styled Components",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/StyledComponents.svg",
            ],
            [
                "name" => "Supabase",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Supabase-Light.svg",
            ],
            [
                "name" => "Scala",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Scala-Light.svg",
            ],
            [
                "name" => "Selenium",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Selenium.svg",
            ],
            [
                "name" => "Sketchup",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Sketchup-Light.svg",
            ],
            [
                "name" => "Svelte",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Svelte.svg",
            ],
            [
                "name" => "Svg",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/SVG-Light.svg",
            ],
            [
                "name" => "Swift",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Swift.svg",
            ],
            [
                "name" => "Symfony",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Symfony-Light.svg",
            ],
            [
                "name" => "Tailwind CSS",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/TailwindCSS-Light.svg",
            ],
            [
                "name" => "Tauri",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Tauri-Light.svg",
            ],
            [
                "name" => "TensorFlow",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/TensorFlow-Light.svg",
            ],
            [
                "name" => "TypeScript",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/TypeScript.svg",
            ],
            [
                "name" => "Unity",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Unity-Light.svg",
            ],
            [
                "name" => "Unreal Engine",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/UnrealEngine.svg",
            ],
            [
                "name" => "V",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/V-Light.svg",
            ],
            [
                "name" => "Vala",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Vala.svg",
            ],
            [
                "name" => "Varcel",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Vercel-Light.svg",
            ],
            [
                "name" => "Vim",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/VIM-Light.svg",
            ],
            [
                "name" => "Visual Studio",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/VisualStudio-Light.svg",
            ],
            [
                "name" => "Vite",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Vite-Light.svg",
            ],
            [
                "name" => "Visual Studio Code",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/VSCode-Light.svg",
            ],
            [
                "name" => "VueJS",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/VueJS-Light.svg",
            ],
            [
                "name" => "WebAssembly",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/WebAssembly.svg",
            ],
            [
                "name" => "Webpack",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Webpack-Light.svg",
            ],
            [
                "name" => "WindiCSS",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/WindiCSS-Light.svg",
            ],
            [
                "name" => "WordPress",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Wordpress.svg",
            ],
            [
                "name" => "Workers",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Workers-Light.svg",
            ],
            [
                "name" => "Zig",
                "logo" =>
                    "https://github.com/tandpfun/skill-icons/raw/main/icons/Zig-Light.svg",
            ],
        ];

        foreach ($technologies as $technology) {
            $newTechnology = new Technology();
            $newTechnology->name = $technology["name"];
            $newTechnology->logo = $technology["logo"];
            $newTechnology->save();
        }
    }
}
