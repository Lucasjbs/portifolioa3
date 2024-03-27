document.getElementById("enLangLink").setAttribute("href", "/en/portfolio");
document.getElementById("brLangLink").setAttribute("href", "/br/portfolio");

const portfolioRegexEn = /\/(en)(?![A-Z])/;
const portfolioRegexBr = /\/(br)(?![A-Z])/;
const portfolioUrl = window.location.href;

if (portfolioRegexBr.test(portfolioUrl)) {
    const card1Content = document.querySelector(".card1 .cardContent");
    card1Content.innerHTML = '<p>Experiente em desenvolvimento de códigos back-end em ambientes dinâmicos como o de startups de tecnologia, juntamente com experiência prática como desenvolvedor full-stack em vários projetos universitários e pessoais.</p>';

    const card2Content1 = document.querySelector(".card2 .cardContent1");
    const card2Content2 = document.querySelector(".card2 .cardContent2");
    card2Content1.innerHTML = '<p>Instituto Federal do Sul de Minas - Campus Poços de Caldas</p><p>Bacharelado em Engenharia de Computação · (2016 - 2022)</p>';
    card2Content2.innerHTML = '<p>&#x203A; Inglês Fluente</p><p>&#x203A; Português Fluente</p>';

    const skillsSection = document.querySelector(".skills.sectionContent");
    const experienceSection = document.querySelector(".experience.sectionContent");
    const aboutSection = document.querySelector(".about.sectionContent");

    skillsSection.innerHTML = '<p>&#187; Experiente em desenvolvimento de códigos com <strong>PHP e Javascript</strong>;</p>' +
        '<p>&#187; Experiente com metodologias de <strong>Desenvolvimento Orientado a Testes (TDD)</strong>, utilizando phpunit para garantir a confiabilidade do código;</p><p>&#187; Compreensão sólida dos fundamentos da linguagem, <strong>programação orientada a objetos(OOP)</strong>, princípios SOLID e boas práticas;</p>' +
        '<p>&#187; Proficiente em <strong>documentação de projetos</strong>, com foco em documentação clara e abrangente para auxiliar na compreensão e manutenção do projeto;</p>' +
        '<p>&#187; Proficiente em <strong>sistemas de controle de versão</strong> como Git, GitHub e GitLab, com experiência em gerenciamento de repositórios de código e colaboração com equipes;</p><p>&#187; Familiarizado com <strong>Slim Framework, HyperF e Elastic</strong> para desenvolvimento eficiente de backend;</p><p>&#187; Familiarizado com outras linguagens de programação, como <strong>C/C++, Java, C#</strong>;</p>';

    experienceSection.innerHTML = '<p><strong>MOVA | Crédito como Serviço</strong></p>' +
        '<p>Programador Júnior</p>' +
        '<p>Janeiro de 2023 - Janeiro de 2024, São Paulo, Brasil</p>' +
        '<p>A Mova é a primeira plataforma de empréstimo peer-to-peer aprovada e supervisionada pelo Banco Central do Brasil na forma de uma Sociedade de Empréstimo entre Pessoas (SEP).</p>' +
        '<p>Responsabilidades:</p>' +
        '<p>&#x203A; Desenvolvimento e execução de projetos e serviços de backend, utilizando as tecnologias Slim e HyperF.</p>' +
        '<p>&#x203A; Desenvolvimento e implementação de estratégias de cobertura de testes.</p>' +
        '<p>&#x203A; Integração com o banco de dados MySQL e uso do Elastic para otimizar desempenho e escalabilidade.</p>' +
        '<p>Resultados:</p>' +
        '<p>&#x203A; Alcancei uma alta taxa de sucesso na correção de mais de 90% dos testes para projetos e serviços dentro da minha equipe, incluindo o maior projeto da empresa.</p>' +
        '<p>&#x203A; Participei da implementação de Tags de Acesso para clientes do site, melhorando significativamente a experiência do usuário e fortalecendo as medidas de segurança.</p>' +
        '<p>&#x203A; Participei dos ajustes na geração de documentação para o documento 3040 do BACEN (Banco Central do Brasil), garantindo tanto a conformidade quanto a eficiência do processo.</p>' +
        '<p>&#x203A; Estabeleci protocolos seguros de registro para identificação de operadores por meio de dados criptografados, aumentando assim a segurança operacional.</p>' +
        '<p>&#x203A; Executei com sucesso migrações CI/CD, contribuindo para o aprimoramento dos processos de integração contínua e entrega contínua.</p>' +
        '<p>&#x203A; Executei migrações de serviços previamente desenvolvidos em Slim para a arquitetura HyperF, resultando em um desempenho e escalabilidade aprimorados.</p>' +
        '<br><br>' +
        '<p><strong>Instituto Federal de Educação, Ciência e Tecnologia do Sul de Minas Gerais.</strong></p>' +
        '<p>Programa de Mediadores Virtuais de Ensino</p>' +
        '<p>Março de 2021 - Agosto de 2021, Poços de Caldas, Minas Gerais, Brasil</p>' +
        '<p>Bolsista no programa de mediadores virtuais de ensino, cujo propósito era auxiliar a comunicação entre alunos e professores durante o ensino remoto, sob a orientação do coordenador educacional André Gripp.</p>';

    aboutSection.innerHTML = '<p>Olá! Sou Lucas Bastos, um dedicado desenvolvedor de software que, ao longo de minha jornada profissional, passei por caminhos desafiadores que me ensinaram a importância da disciplina, da colaboração, do aprendizado contínuo e da busca incessante pelo crescimento profissional.</p>' +
        '<p>Atualmente, estou buscando novas conexões e oportunidades para trabalhar no desenvolvimento de backend, trocar ideias e crescer profissionalmente.</p>';

    const educationSubtitle = document.querySelector(".education.subtitle");
    const languagesSubtitle = document.querySelector(".languages.subtitle");
    const contactSubtitle = document.querySelector(".contact.subtitle");
    educationSubtitle.textContent = 'Educação: ';
    languagesSubtitle.textContent = 'Línguas: ';
    contactSubtitle.textContent = 'Contato: ';

    const skillsSubtitle = document.querySelector(".skills.subtitle");
    const experienceSubtitle = document.querySelector(".experience.subtitle");
    const aboutSubtitle = document.querySelector(".about.subtitle");
    skillsSubtitle.textContent = 'Habilidades e Competências: ';
    experienceSubtitle.textContent = 'Experiência: ';
    aboutSubtitle.textContent = 'Sobre mim: ';

}
else {
    // Language = English (Default)
}